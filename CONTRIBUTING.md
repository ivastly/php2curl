# Contributions are welcome

* just create a PR on Github and let me know

## creating a test
It is a bit tricky process, so I made a helper script for that. Basically, you can do the following
steps to cover new functionality with unit test. Feel free to improve this guide as well.

* implement new functionality in `Php2Curl` class
* configure new Postman request to approach new functionality (if you are testing _PATCH_ requests, then configure Postman to send _PATCH_, etc.)
* include a GET parameter `name` to that request, something like `?name=simple_patch`. String `simple_patch` will be used as an _identifier_ of the test case.
* start php dev server, e.g. `cd php2curl; php -S localhost:8000 test/persist_test_case.php`
* send a request from step#2 to the server from step#4 (here, to http://localhost:8000)
* everything (PHP globals, php input data, etc.) will be saved into `postman_outcome/postman_<identifier>.php`
* create new test case in `Php2CurlTest.php` file following the template:
```php
    /**
     * @test
     */
    public function it_can_handle_<test case identifier>() // test case name is it_can_handle_<test case identifier>
    {
        $expectedCurl = ''; // this is intentionally empty string at the beginning
        $sut = $this->createSut('<identifer>'); // test case identifier here as an argument
        $this->assertEquals($expectedCurl, $sut->doAll());
    }
```
* run the new test case, and you will see the curl command returned by `doAll()` on the screen.
* copy/paste it to terminal and run
* if the command is correct, you should find a file with the same format under `curl_outcome/curl_<identifier>.php`. 
Copy the content of this file and carefully compare it
with `postman_outcome/postman_<identifier>.php` (via "compare with clipboard" from PHPStorm, or just http://www.quickdiff.com/), 
treating the postman one as the source of truth.
* if those two files are equal functionality-wise (`$_SERVER['REQUEST_TIME']` is different and anything else like that) 
you can copy the curl command to `$exceptedCurl` variable in the test.
* run the test again to make sure it is green now
* make sure other tests are still green
* done!
