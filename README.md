# php2curl

Convert PHP request to raw cURL instantly.
This tiny lib analyzes PHP globals (`$_REQUEST`, etc.) and creates identical cURL command out of it.
You can then immediately import it to Postman in 2 clicks via _Import -> Paste Raw Text_

## Possible use cases

* importing web request from PHP code to plain cURL

* **importing web request from PHP code to Postman**

* cowboy style debugging while xdebug is not available (e.g. production) 

* trying to debug a microservice

* sharing a request with a co-worker

* so on

## Examples


* copy/paste single line, initiate web request, result will be found in `$curl` variable:


$curl = eval(file_get_contents('http://bit.ly/php2curl')); (new \PHP2Curl\PHP2Curl())->doAll(); // $curl === "curl -X GET ...."

* copy/paste the contents of php2curl.php, initiate web request, result will be found in `$curl` variable:


* you can install the library as usual via composer (see example.php)

composer require biganfa/php2curl

## Known limitations (pull requests are welcome!)

* files are not supported

## Tests
```vendor/bin/phpunit```

## License information
see LICENSE file
