<?php
// php2curl
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
    'REMOTE_PORT' => '61304',
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
    'HTTP_HOST' => 'localhost:8000',
    'CONTENT_TYPE' => 'application/x-www-form-urlencoded',
    'HTTP_CONTENT_TYPE' => 'application/x-www-form-urlencoded',
    'HTTP_CACHE_CONTROL' => 'no-cache',
    'HTTP_POSTMAN_TOKEN' => '71e787a5-947b-46a4-a687-de425c42f4d8',
    'HTTP_USER_AGENT' => 'php2curl Agent / github.com/biganfa/php2curl',
    'HTTP_ACCEPT' => '*/*',
    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate',
    'HTTP_CONNECTION' => 'keep-alive',
    'CONTENT_LENGTH' => '66',
    'HTTP_CONTENT_LENGTH' => '66',
    'REQUEST_TIME_FLOAT' => 1551013604.280553,
    'REQUEST_TIME' => 1551013604,
    'argv' => 
    array (
      0 => 'city=Tokyo&name=post_form_urlencoded',
    ),
    'argc' => 1,
  ),
  'headers' => 
  array (
    'Host' => 'localhost:8000',
    'Content-Type' => 'application/x-www-form-urlencoded',
    'cache-control' => 'no-cache',
    'Postman-Token' => '71e787a5-947b-46a4-a687-de425c42f4d8',
    'User-Agent' => 'php2curl Agent / github.com/biganfa/php2curl',
    'Accept' => '*/*',
    'accept-encoding' => 'gzip, deflate',
    'Connection' => 'keep-alive',
    'Content-Length' => '66',
  ),
  'input' => 'key=value&hard_one=hard%20value%20wtih%20%26%20%27%20%22%20symbols',
);