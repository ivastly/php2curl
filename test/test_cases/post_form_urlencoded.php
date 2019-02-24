<?php
// Postman
// post_form_urlencoded test case 
return $globalsArray = array (
  'get' => 
  array (
    'city' => 'Tokyo',
    'name' => 'post_form_urlencoded',
  ),
  'post' => 
  array (
    'key' => 'value',
    'hard_one' => 'hard value wtih & \' " symbols',
  ),
  'request' => 
  array (
    'city' => 'Tokyo',
    'name' => 'post_form_urlencoded',
    'key' => 'value',
    'hard_one' => 'hard value wtih & \' " symbols',
  ),
  'server' => 
  array (
    'DOCUMENT_ROOT' => '/Users/vasiliy/PhpstormProjects/php2curl',
    'REMOTE_ADDR' => '::1',
    'REMOTE_PORT' => '56747',
    'SERVER_SOFTWARE' => 'PHP 7.1.23 Development Server',
    'SERVER_PROTOCOL' => 'HTTP/1.1',
    'SERVER_NAME' => 'localhost',
    'SERVER_PORT' => '8000',
    'REQUEST_URI' => '/weather/forecast?city=Tokyo&name=post_form_urlencoded',
    'REQUEST_METHOD' => 'POST',
    'SCRIPT_NAME' => '/weather/forecast',
    'SCRIPT_FILENAME' => 'test/persist_test_case.php',
    'PHP_SELF' => '/weather/forecast',
    'QUERY_STRING' => 'city=Tokyo&name=post_form_urlencoded',
    'CONTENT_TYPE' => 'application/x-www-form-urlencoded',
    'HTTP_CONTENT_TYPE' => 'application/x-www-form-urlencoded',
    'HTTP_CACHE_CONTROL' => 'no-cache',
    'HTTP_POSTMAN_TOKEN' => '71e787a5-947b-46a4-a687-de425c42f4d8',
    'HTTP_USER_AGENT' => 'PostmanRuntime/7.6.0',
    'HTTP_ACCEPT' => '*/*',
    'HTTP_HOST' => 'localhost:8000',
    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate',
    'CONTENT_LENGTH' => '66',
    'HTTP_CONTENT_LENGTH' => '66',
    'HTTP_CONNECTION' => 'keep-alive',
    'REQUEST_TIME_FLOAT' => 1551012325.193025,
    'REQUEST_TIME' => 1551012325,
    'argv' => 
    array (
      0 => 'city=Tokyo&name=post_form_urlencoded',
    ),
    'argc' => 1,
  ),
  'headers' => 
  array (
    'Content-Type' => 'application/x-www-form-urlencoded',
    'cache-control' => 'no-cache',
    'Postman-Token' => '71e787a5-947b-46a4-a687-de425c42f4d8',
    'User-Agent' => 'PostmanRuntime/7.6.0',
    'Accept' => '*/*',
    'Host' => 'localhost:8000',
    'accept-encoding' => 'gzip, deflate',
    'content-length' => '66',
    'Connection' => 'keep-alive',
  ),
  'input' => 'key=value&hard_one=hard%20value%20wtih%20%26%20%27%20%22%20symbols',
);