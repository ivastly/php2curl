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


* **zero configuration!** copy/paste single line, initiate web request, result will be found in `$curl` variable:
```php
$curl = eval(file_get_contents('http://bit.ly/_php2curl')); // $curl variable contains the cURL command here
```

* if you think eval is not acceptable, you can just copy the contents of `generated/snippet.php` and paste it 
anywhere in your project. `$curl` variable will hold the desired cURL command.

* you can install the library as usual via composer (see example.php)

```bash
composer require biganfa/php2curl
```
## Known limitations (pull requests are welcome!)

* files are not supported

## Tests
```vendor/bin/phpunit```

## License information
see LICENSE file
