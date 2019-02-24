<?php declare(strict_types=1);

/*
 * 1. start web server `cd php2curl; php -S localhost:8001 example_best.php`
 * 2. go to http://localhost:8001/test/path
 * 3. any request to http://localhost:8001/ will be printed as cURL command in the response
 */
$curl = eval(file_get_contents('http://bit.ly/_php2curl'));

echo $curl;
