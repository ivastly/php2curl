<?php declare(strict_types=1);

/*

try to call this file with built-in php web server like this:

*/

require_once 'vendor/autoload.php';

use Php2Curl\Php2Curl;

echo (new Php2Curl())->doAll();
