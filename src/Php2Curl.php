<?php declare(strict_types=1);

namespace Php2Curl;

use Exception;
use function file_get_contents;
use function getallheaders;
use function preg_replace;
use function str_replace;
use function stripos;
use function strtolower;

class Php2Curl
{
    const OPEN_BRACE    = '[';
    const CLOSING_BRACE = ']';
    const DOUBLE_QOUTE  = '"';
    const QOUTE         = "'";
    // this is how we are going to escape a single quote in post parameters
    const QOUTE_REPLACEMENT = "'\\''";

    /** @var array */
    private $get;

    /** @var array */
    private $post;

    /** @var array */
    private $request;

    /** @var array */
    private $server;

    /** @var array */
    private $headers;

    /** @var string */
    private $phpInput;

    private $guessedContentType;

    // not the full list, just special cases from Postman app
    const CONTENT_TYPE_FORM_DATA        = 'multipart/form-data';
    const CONTENT_TYPE_FORM_URL_ENCODED = 'x-www-form-urlencoded';
    const CONTENT_TYPE_RAW              = 'raw';
    const CONTENT_TYPE_UNKNOWN          = 'unknown';

    public function __construct($get = null, $post = null, $request = null, $server = null, $headers = null, $phpInput = null)
    {
        $this->get      = $get ?? $_GET;
        $this->post     = $post ?? $_POST;
        $this->request  = $request ?? $_REQUEST;
        $this->server   = $server ?? $_SERVER;
        $this->headers  = $headers ?? getallheaders();

        $this->phpInput = $phpInput ?? file_get_contents('php://input');

        // i have heard complicated actions inside constructor is anti-pattern, but with this comment it is not anymore (it is actually "tech debt")
        $this->guessedContentType = $this->guessContentTypeFromHeaders();
        $this->removeBoundaryPartFromContentTypeAndContentLengthFromHeaders();
    }

    private function removeBoundaryPartFromContentTypeAndContentLengthFromHeaders()
    {
        // in RFC it is said that boundary is required. In practice, everything works like a charm without boundary part. Maybe it could be a problem for file uploads? will fix in v2.
        // also we want to drop the 'content-length' header, because if we remove the boundary, the body is changed and request just hangs forever
        $purgeBoundaryPart = function ($string) {
            return preg_replace('/; boundary=(-)+[[:digit:]]+$/', '', $string);
        };

        if (isset($this->server['HTTP_CONTENT_TYPE']))
        {
            $this->server['CONTENT_TYPE']      = $purgeBoundaryPart($this->server['CONTENT_TYPE']);
            $this->server['HTTP_CONTENT_TYPE'] = $purgeBoundaryPart($this->server['HTTP_CONTENT_TYPE']);
            $this->headers['content-type']     = $purgeBoundaryPart($this->headers['content-type']);
        }

        unset($this->server['CONTENT_LENGTH']);
        unset($this->server['HTTP_CONTENT_LENGTH']);
        unset($this->headers['content-length']);
    }

    private function guessContentTypeFromHeaders()
    {
        foreach ($this->getHeadersArray() as $header => $value)
        {

            if (strtolower($header) == 'content-type')
            {

                if (stripos($value, 'multipart/form-data') !== false)
                {
                    return self::CONTENT_TYPE_FORM_DATA;
                }

                if (stripos($value, 'www-form-urlencoded') !== false)
                {
                    return self::CONTENT_TYPE_FORM_URL_ENCODED;
                }

                return self::CONTENT_TYPE_UNKNOWN;
            }
        }

        return self::CONTENT_TYPE_UNKNOWN;
    }

    /**
     * @return string
     * @throws Exception
     */
    public function doAll()
    {
        return "curl --insecure "
            . '-X ' . $this->getMethod()
            . ' ' . self::DOUBLE_QOUTE . $this->getFullURLPart() . self::DOUBLE_QOUTE
            . $this->getHeadersPart()
            . $this->getRequestBodyPart();
    }

    private function getMethod()
    {
        return $this->server['REQUEST_METHOD'];
    }

    private function getFullURLPart()
    {

        $portPart = '';
        if ($this->server['SEVER_PORT'] != '80')
        {
            $portPart = ':' . $this->server['SERVER_PORT'];
        }

        return $this->server['SERVER_NAME'] . $portPart . $this->server['REQUEST_URI'];
    }

    private function getHeadersPart()
    {
        $result = '';

        foreach ($this->getHeadersArray() as $key => $value)
        {

            $result .= " -H '$key: $value'";
        }

        return $result;
    }

    private function escapeSingleQuote($parameter)
    {
        return str_replace(self::QOUTE, self::QOUTE_REPLACEMENT, $parameter);
    }

    /**
     * @return string
     * @throws Exception
     */
    private function getRequestBodyPart()
    {

        switch ($this->getMethod())
        {

            case 'POST':

                if ($this->post)
                {

                    switch ($this->guessedContentType)
                    {
                        case self::CONTENT_TYPE_FORM_DATA: // RFC 2388

                            $paramsArray = [];
                            foreach ($this->post as $key => $value)
                            {
                                if (is_array($value))
                                {
                                    foreach ($value as $subKey => $subValue)
                                    {
                                        if (is_array($subValue))
                                        {
                                            throw new Exception("2-dimensional arrays are not supported");
                                        }

                                        $subValue      = $this->escapeSingleQuote($subValue);
                                        $paramsArray[] = "$key" . $this::OPEN_BRACE . $subKey . $this::CLOSING_BRACE . '=' . $subValue;
                                    }
                                } else
                                {
                                    $value         = $this->escapeSingleQuote($value);
                                    $paramsArray[] = "$key=$value";
                                }
                            }

                            $paramsString = " --form '" . implode("' --form '", $paramsArray) . self::QOUTE;

                            return $paramsString;

                            break;

                        case self::CONTENT_TYPE_FORM_URL_ENCODED:

                            break;

                        case self::CONTENT_TYPE_RAW:

                            break;

                        case self::CONTENT_TYPE_UNKNOWN:

                            break;
                    }
                }

                break;

            case 'PUT':
            case 'PATCH':
            case 'DELETE':
                break;

            case 'OPTIONS':
                break;
        };

        return '';
    }

    private function getHeadersArray()
    {
        $headers               = $this->headers;
        $headers['User-Agent'] = 'php2curl Agent / github.com/biganfa/php2curl';

        return $headers;
    }
}
