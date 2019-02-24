<?php declare(strict_types=1);

/*
using PHP builtin web server to run this example:
cd php2curl; php -S localhost:8001 example.php // then go to localhost:8001/example/path
*/

require_once 'vendor/autoload.php';

use Php2Curl\Php2Curl;

echo (new Php2Curl())->doAll();
