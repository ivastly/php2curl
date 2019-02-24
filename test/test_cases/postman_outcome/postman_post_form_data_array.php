<?php
// Postman
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
    'REMOTE_PORT' => '61366',
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
    'CONTENT_TYPE' => 'multipart/form-data; boundary=--------------------------478347269993951676096424',
    'HTTP_CONTENT_TYPE' => 'multipart/form-data; boundary=--------------------------478347269993951676096424',
    'HTTP_CACHE_CONTROL' => 'no-cache',
    'HTTP_POSTMAN_TOKEN' => '3a9f31ea-6498-4f2d-93a0-535c5861a168',
    'HTTP_USER_AGENT' => 'PostmanRuntime/7.6.0',
    'HTTP_ACCEPT' => '*/*',
    'HTTP_HOST' => 'localhost:8000',
    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate',
    'CONTENT_LENGTH' => '442',
    'HTTP_CONTENT_LENGTH' => '442',
    'HTTP_CONNECTION' => 'keep-alive',
    'REQUEST_TIME_FLOAT' => 1551018336.471554,
    'REQUEST_TIME' => 1551018336,
    'argv' => 
    array (
      0 => 'city=Tokyo&name=post_form_data_array',
    ),
    'argc' => 1,
  ),
  'headers' => 
  array (
    'Content-Type' => 'multipart/form-data; boundary=--------------------------478347269993951676096424',
    'cache-control' => 'no-cache',
    'Postman-Token' => '3a9f31ea-6498-4f2d-93a0-535c5861a168',
    'User-Agent' => 'PostmanRuntime/7.6.0',
    'Accept' => '*/*',
    'Host' => 'localhost:8000',
    'accept-encoding' => 'gzip, deflate',
    'content-length' => '442',
    'Connection' => 'keep-alive',
  ),
  'input' => '',
);