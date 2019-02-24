# php2curl

Convert PHP request to raw CURL instantly.
This tiny lib analyzes PHP globals ($_REQUEST, etc.) anywhere in PHP code and creates identical CURL command out of it.
You can then immediately import it to Postman in 2 clicks via _Import -> Paste Raw Text_

## Possible use cases

* importing web request from PHP code to plain CURL

* *importing web request from PHP code to Postman*

* cowboy style debugging while xdebug is not available (e.g. production) 

* trying to debug a microservice

* sharing a request with a co-worker

* so on

## Examples


* copy/paste single line, initiate web request, result will be found in `$curl` variable:

$url = eval(file_get_contents('bit.ly/..'));


* copy/paste the contents of php2curl.php, initiate web request, result will be found in `$curl` variable:


* you can install the library as usual via composer


## Known limitations (pull requests are welcome!)

* files are not supported

## Tests
```phpunit```

## License information
see LICENSE file
