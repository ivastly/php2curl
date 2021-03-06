<?php

namespace Php2Curl;

use PHPUnit\Framework\TestCase;

class Php2CurlTest extends TestCase
{
    private function createSut($testCaseFileName)
    {
        $globals  = require_once "test_cases/$testCaseFileName.php";
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
        $expectedCurl = <<<CURL
curl --insecure -X GET "localhost:8000/weather/forecast?city=Tokyo&name=simple_get" -H 'cache-control: no-cache' -H 'Postman-Token: cedb4d41-7c59-40ad-bc9e-3828d808ebe7' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl'
CURL;
        $sut          = $this->createSut('simple_get');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_get_with_basic_auth()
    {
        $expectedCurl = <<<CURL
curl --insecure -X GET "localhost:8000/weather/forecast?city=Tokyo&name=basic_auth" -H 'cache-control: no-cache' -H 'Postman-Token: 5ec1c295-f313-4873-abbf-c16fa7149408' -H 'Authorization: Basic dXNlcjpwYXNzd29yZA==' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl'
CURL;

         $sut          = $this->createSut('basic_auth');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_get_with_cookies()
    {
        $expectedCurl = <<<CURL
curl --insecure -X GET "localhost:8000/weather/forecast?city=Tokyo&date=2018-03-31&name=get_with_cookies" -H 'cache-control: no-cache' -H 'Postman-Token: b27615a1-f2f3-4859-af57-398e821f1a31' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'cookie: remixsid=hashed0000value; Cookie_4=value' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl'
CURL;

             $sut          = $this->createSut('get_with_cookies');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_post_with_form_data()
    {
        $expectedCurl = <<<CURL
curl --insecure -X POST "localhost:8000/weather/forecast?city=Tokyo&name=post_form_data" -H 'cache-control: no-cache' -H 'Postman-Token: fe655121-2737-4c6a-9a3e-3bf38c6a0016' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'content-type: multipart/form-data' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl' --form 'post_key=post-value' --form 'post_key2=hard value wtih & '\'' " symbols'
CURL;
        $sut          = $this->createSut('post_form_data');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_post_with_form_url_encoded()
    {
        $expectedCurl = <<<CURL
curl --insecure -X POST "localhost:8000/weather/forecast?city=Tokyo&name=post_form_urlencoded" -H 'Content-Type: application/x-www-form-urlencoded' -H 'cache-control: no-cache' -H 'Postman-Token: 71e787a5-947b-46a4-a687-de425c42f4d8' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl' --data 'key=value&hard_one=hard%20value%20wtih%20%26%20%27%20%22%20symbols'
CURL;
        $sut          = $this->createSut('post_form_urlencoded');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_post_with_array_parameters()
    {
        $expectedCurl = <<<CURL
curl --insecure -X POST "localhost:8000/weather/forecast?city=Tokyo&name=post_form_data_array" -H 'Content-Type: multipart/form-data' -H 'cache-control: no-cache' -H 'Postman-Token: 3a9f31ea-6498-4f2d-93a0-535c5861a168' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl' --form 'array[key_one]=post-value' --form 'array[key_two]=hard value wtih & '\'' " symbols' --form 'scalar_key=scalar value'
CURL;
        $sut          = $this->createSut('post_form_data_array');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_post_with_application_json_payload()
    {
        $expectedCurl = <<<CURL
curl --insecure -X POST "localhost:8000/weather/forecast?city=Tokyo&name=post_form_raw_json" -H 'Content-Type: application/json' -H 'cache-control: no-cache' -H 'Postman-Token: 7e64e0b9-cb95-4ad8-aafe-7d51c7c016a3' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl' --data '{"true": false, "value": "hard value wtih & '\'' \" symbols"}'
CURL;
        $sut          = $this->createSut('post_form_raw_json');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_simple_put()
    {
        $expectedCurl = <<<CURL
curl --insecure -X PUT "localhost:8000/weather/forecast?city=Tokyo&name=simple_put" -H 'Content-Type: application/json' -H 'cache-control: no-cache' -H 'Postman-Token: 4869afba-3314-49d4-b200-872040be490c' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl' --data '{"true": false, "value": "hard value wtih & '\'' \" symbols"}'
CURL;
        $sut = $this->createSut('simple_put');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_simple_patch()
    {
        $expectedCurl = <<<CURL
curl --insecure -X PATCH "localhost:8000/weather/forecast?city=Tokyo&name=simple_patch" -H 'Content-Type: application/json' -H 'cache-control: no-cache' -H 'Postman-Token: f8577754-a3cc-4c90-be83-66b513205e88' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl' --data '{"true": false, "value": "hard value wtih & '\'' \" symbols"}'
CURL;
        $sut = $this->createSut('simple_patch');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_simple_delete()
    {
        $expectedCurl = <<<CURL
curl --insecure -X DELETE "localhost:8000/weather/forecast?city=Tokyo&name=simple_delete" -H 'Content-Type: application/json' -H 'cache-control: no-cache' -H 'Postman-Token: cd8232f7-5d9c-45e5-a1b4-bc28c2a7b529' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl' --data '{"true": false, "value": "hard value wtih & '\'' \" symbols"}'
CURL;
        $sut = $this->createSut('simple_delete');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }

    /**
     * @test
     */
    public function it_can_handle_simple_options()
    {
        $expectedCurl = <<<CURL
curl --insecure -X OPTIONS "localhost:8000/weather/forecast?city=Tokyo&name=simple_options" -H 'Content-Type: application/json' -H 'cache-control: no-cache' -H 'Postman-Token: edd0c45f-2d3a-44b1-a063-ac5f2ebbae25' -H 'Accept: */*' -H 'Host: localhost:8000' -H 'accept-encoding: gzip, deflate' -H 'Connection: keep-alive' -H 'User-Agent: php2curl Agent - github.com/biganfa/php2curl'
CURL;
        $sut = $this->createSut('simple_options');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }
}
