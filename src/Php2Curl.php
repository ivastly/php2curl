<?php declare(strict_types=1);

namespace Php2Curl;

use function file_get_contents;
use function getallheaders;
use PHPUnit\Runner\Exception;

class Php2Curl
{
    const OPEN_BRACE    = '[';
    const CLOSING_BRACE = ']';

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

    public function __construct($get = null, $post = null, $request = null, $server = null, $headers = null, $phpInput = null)
    {
        $this->get      = $get ?? $_GET;
        $this->post     = $post ?? $_POST;
        $this->request  = $request ?? $_REQUEST;
        $this->server   = $server ?? $_SERVER;
        $this->headers  = $headers ?? getallheaders();
        $this->phpInput = $phpInput ?? file_get_contents('php://input');
    }

    public function doAll()
    {
        return "curl --insecure "
            . '-X ' . $this->getMethod()
            . ' ' . $this->getFullURLPart()
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
        if ($this->server['SEVER_PORT'] != '80') {
            $portPart = ':' . $this->server['SERVER_PORT'];
        }

        return $this->server['SERVER_NAME'] . $portPart . $this->server['REQUEST_URI'];
    }

    private function getHeadersPart()
    {
        $result = '';

        foreach ($this->getHeadersArray() as $key => $value) {

            $result .= " -H '$key: $value'";
        }

        return $result;
    }

    private function getRequestBodyPart()
    {

        if ($this->getMethod() == 'POST') {

            if ($this->post) {

                $headersArray = $this->getHeadersArray();
                if (isset($headersArray['Content-Type'])) {

                    switch ($headersArray['Content-Type']) {
                        case 'application/x-www-form-urlencoded':

                            $paramsArray = [];
                            foreach ($_POST as $key => $value) {

                                if (is_array($value)) {

                                    // only 1-dimensional arrays are supported
                                    foreach ($value as $subKey => $subValue) {

                                        if (is_array($subValue)) {
                                            throw new Exception("2-dimensional arrays are not supported");
                                        }
                                        $paramsArray [] = "$key" . $this::OPEN_BRACE . $subKey . $this::CLOSING_BRACE . '=' . $subValue;
                                    }
                                } else {

                                    $paramsArray [] = "$key=$value";
                                }
                            }

                            $paramsString = implode('&', $paramsArray);

                            return " -d '$paramsString'";

                            break;
                        // todo add other application/json, form-data, raw
                    }
                }
            }
        }

        return '';
    }

    private function getHeadersArray()
    {
        $headers                    = $this->headers;
        $headers['User-Agent'] = 'php2curl Agent / github.com/biganfa/php2curl';

        return $headers;
    }
}
