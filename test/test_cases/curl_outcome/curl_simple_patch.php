<?php
// php2curl
// simple_patch test case 
return $globalsArray = array (
  'get' => 
  array (
    'city' => 'Tokyo',
    'name' => 'simple_patch',
  ),
  'post' => 
  array (
  ),
  'request' => 
  array (
    'city' => 'Tokyo',
    'name' => 'simple_patch',
  ),
  'server' => 
  array (
    'DOCUMENT_ROOT' => '/Users/vasiliy/PhpstormProjects/php2curl',
    'REMOTE_ADDR' => '::1',
    'REMOTE_PORT' => '62851',
    'SERVER_SOFTWARE' => 'PHP 7.1.23 Development Server',
    'SERVER_PROTOCOL' => 'HTTP/1.1',
    'SERVER_NAME' => 'localhost',
    'SERVER_PORT' => '8000',
    'REQUEST_URI' => '/weather/forecast?city=Tokyo&name=simple_patch',
    'REQUEST_METHOD' => 'PATCH',
    'SCRIPT_NAME' => '/weather/forecast',
    'SCRIPT_FILENAME' => 'test/persist_test_case.php',
    'PHP_SELF' => '/weather/forecast',
    'QUERY_STRING' => 'city=Tokyo&name=simple_patch',
    'HTTP_HOST' => 'localhost:8000',
    'CONTENT_TYPE' => 'application/json',
    'HTTP_CONTENT_TYPE' => 'application/json',
    'HTTP_CACHE_CONTROL' => 'no-cache',
    'HTTP_POSTMAN_TOKEN' => 'f8577754-a3cc-4c90-be83-66b513205e88',
    'HTTP_ACCEPT' => '*/*',
    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate',
    'HTTP_CONNECTION' => 'keep-alive',
    'HTTP_USER_AGENT' => 'php2curl Agent - github.com/biganfa/php2curl',
    'CONTENT_LENGTH' => '58',
    'HTTP_CONTENT_LENGTH' => '58',
    'REQUEST_TIME_FLOAT' => 1551032786.4034,
    'REQUEST_TIME' => 1551032786,
    'argv' => 
    array (
      0 => 'city=Tokyo&name=simple_patch',
    ),
    'argc' => 1,
  ),
  'headers' => 
  array (
    'Host' => 'localhost:8000',
    'Content-Type' => 'application/json',
    'cache-control' => 'no-cache',
    'Postman-Token' => 'f8577754-a3cc-4c90-be83-66b513205e88',
    'Accept' => '*/*',
    'accept-encoding' => 'gzip, deflate',
    'Connection' => 'keep-alive',
    'User-Agent' => 'php2curl Agent - github.com/biganfa/php2curl',
    'Content-Length' => '58',
  ),
  'input' => '{"true": false, "value": "hard value wtih & \' \\" symbols"}',
);