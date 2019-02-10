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
        $expectedCurl = 'curl --insecure -X GET localhost:8000/weather/forecast?city=Tokyo -H \'Host: localhost:8000\' -H \'cache-control: no-cache\' -H \'Postman-Token: fca38f8b-88b4-4dc2-b8ef-d4cac25081ae\' -H \'User-Agent: php2curl Agent / github.com/biganfa/php2curl\' -H \'Accept: */*\' -H \'accept-encoding: gzip, deflate\' -H \'Connection: keep-alive\'';
        $sut          = $this->createSut('simple_get');
        $this->assertEquals($expectedCurl, $sut->doAll());
    }
}
