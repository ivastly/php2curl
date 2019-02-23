<?php

namespace Php2Curl;

use PHPUnit\Framework\TestCase;

class Php2CurlTest extends TestCase
{
    /**
     * @param $testCaseFileName
     *
     * @return Php2Curl
     */
    private function createSut($testCaseFileName)
    {
        $globals = require_once "test_cases/$testCaseFileName.php";
        $php2curl = new Php2Curl($globals['get'], $globals['post'], $globals['request'], $globals['server'], $globals['headers'], $globals['input']);
        $this->debug($php2curl->doAll());

        return $php2curl;
    }

    private function debug($message)
    {
        echo "\n\n $message \n\n";
    }

    /**
     * @test
     */
    public function it_can_handle_simple_get_request()
    {
        $expectedCurl = 'curl --insecure -X GET "localhost:8000/weather/forecast?city=Tokyo&name=simple_get" -H \'cache-control: no-cache\' -H \'Postman-Token: cedb4d41-7c59-40ad-bc9e-3828d808ebe7\' -H \'User-Agent: php2curl Agent / github.com/biganfa/php2curl\' -H \'Accept: */*\' -H \'Host: localhost:8000\' -H \'accept-encoding: gzip, deflate\' -H \'Connection: keep-alive\'';
        $sut          = $this->createSut('simple_get');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_get_with_basic_auth()
    {
        $expectedCurl = 'curl --insecure -X GET "localhost:8000/weather/forecast?city=Tokyo&name=basic_auth" -H \'cache-control: no-cache\' -H \'Postman-Token: 5ec1c295-f313-4873-abbf-c16fa7149408\' -H \'Authorization: Basic dXNlcjpwYXNzd29yZA==\' -H \'User-Agent: php2curl Agent / github.com/biganfa/php2curl\' -H \'Accept: */*\' -H \'Host: localhost:8000\' -H \'accept-encoding: gzip, deflate\' -H \'Connection: keep-alive\'';
        $sut = $this->createSut('basic_auth');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_get_with_cookies()
    {
        $expectedCurl = 'curl --insecure -X GET "localhost:8000/weather/forecast?city=Tokyo&date=2018-03-31&name=get_with_cookies" -H \'cache-control: no-cache\' -H \'Postman-Token: b27615a1-f2f3-4859-af57-398e821f1a31\' -H \'User-Agent: php2curl Agent / github.com/biganfa/php2curl\' -H \'Accept: */*\' -H \'Host: localhost:8000\' -H \'cookie: remixsid=hashed0000value; Cookie_4=value\' -H \'accept-encoding: gzip, deflate\' -H \'Connection: keep-alive\'';
        $sut = $this->createSut('get_with_cookies');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_post_with_form_data()
    {
        $expectedCurl = <<<CURL
curl --insecure -X POST "localhost:8000/weather/forecast?city=Tokyo&name=post_form_data" -H 'cache-control: no-cache' -H 'Postman-Token: 8075ab05-fe3b-4f22-837b-3cf9686480f4' -H 'User-Agent: php2curl Agent / github.com/biganfa/php2curl' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'content-type: multipart/form-data' -H 'Connection: keep-alive' --form 'post_key=post-value' --form 'post_key2=hard value wtih & '\'' " symbols'
CURL;
;
        $sut = $this->createSut('post_form_data');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }


}
