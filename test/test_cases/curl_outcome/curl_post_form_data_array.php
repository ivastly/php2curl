<?php
// php2curl
// post_form_data_array test case 
return $globalsArray = array (
  'get' => 
  array (
    'city' => 'Tokyo',
    'name' => 'post_form_data_array',
  ),
  'post' => 
  array (
    'array' => 
    array (
      'key_one' => 'post-value',
      'key_two' => 'hard value wtih & \' " symbols',
    ),
    'scalar_key' => 'scalar value',
  ),
  'request' => 
  array (
    'city' => 'Tokyo',
    'name' => 'post_form_data_array',
    'array' => 
    array (
      'key_one' => 'post-value',
      'key_two' => 'hard value wtih & \' " symbols',
    ),
    'scalar_key' => 'scalar value',
  ),
  'server' => 
  array (
    'DOCUMENT_ROOT' => '/Users/vasiliy/PhpstormProjects/php2curl',
    'REMOTE_ADDR' => '::1',
    'REMOTE_PORT' => '56602',
    'SERVER_SOFTWARE' => 'PHP 7.1.23 Development Server',
    'SERVER_PROTOCOL' => 'HTTP/1.1',
    'SERVER_NAME' => 'localhost',
    'SERVER_PORT' => '8000',
    'REQUEST_URI' => '/weather/forecast?city=Tokyo&name=post_form_data_array',
    'REQUEST_METHOD' => 'POST',
    'SCRIPT_NAME' => '/weather/forecast',
    'SCRIPT_FILENAME' => 'test/persist_test_case.php',
    'PHP_SELF' => '/weather/forecast',
    'QUERY_STRING' => 'city=Tokyo&name=post_form_data_array',
    'HTTP_HOST' => 'localhost:8000',
    'HTTP_CACHE_CONTROL' => 'no-cache',
    'HTTP_POSTMAN_TOKEN' => '233f95bc-f336-458b-9a55-1a970760bdad',
    'HTTP_USER_AGENT' => 'php2curl Agent / github.com/biganfa/php2curl',
    'HTTP_ACCEPT' => '*/*',
    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate',
    'HTTP_CONNECTION' => 'keep-alive',
    'CONTENT_LENGTH' => '402',
    'HTTP_CONTENT_LENGTH' => '402',
    'HTTP_EXPECT' => '100-continue',
    'CONTENT_TYPE' => 'multipart/form-data; boundary=------------------------21f155bd8fd55839',
    'HTTP_CONTENT_TYPE' => 'multipart/form-data; boundary=------------------------21f155bd8fd55839',
    'REQUEST_TIME_FLOAT' => 1551016969.505762,
    'REQUEST_TIME' => 1551016969,
    'argv' => 
    array (
      0 => 'city=Tokyo&name=post_form_data_array',
    ),
    'argc' => 1,
  ),
  'headers' => 
  array (
    'Host' => 'localhost:8000',
    'cache-control' => 'no-cache',
    'Postman-Token' => '233f95bc-f336-458b-9a55-1a970760bdad',
    'User-Agent' => 'php2curl Agent / github.com/biganfa/php2curl',
    'Accept' => '*/*',
    'accept-encoding' => 'gzip, deflate',
    'Connection' => 'keep-alive',
    'Content-Length' => '402',
    'Expect' => '100-continue',
    'Content-Type' => 'multipart/form-data; boundary=------------------------21f155bd8fd55839',
  ),
  'input' => '',
);