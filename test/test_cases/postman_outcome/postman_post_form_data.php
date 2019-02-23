<?php
// Postman
// post_form_data test case 
return $globalsArray = array (
  'get' => 
  array (
    'city' => 'Tokyo',
    'name' => 'post_form_data',
  ),
  'post' => 
  array (
    'post_key' => 'post-value',
    'post_key2' => 'hard value wtih & \' " symbols',
  ),
  'request' => 
  array (
    'city' => 'Tokyo',
    'name' => 'post_form_data',
    'post_key' => 'post-value',
    'post_key2' => 'hard value wtih & \' " symbols',
  ),
  'server' => 
  array (
    'DOCUMENT_ROOT' => '/Users/vasiliy/PhpstormProjects/php2curl',
    'REMOTE_ADDR' => '::1',
    'REMOTE_PORT' => '62740',
    'SERVER_SOFTWARE' => 'PHP 7.1.23 Development Server',
    'SERVER_PROTOCOL' => 'HTTP/1.1',
    'SERVER_NAME' => 'localhost',
    'SERVER_PORT' => '8000',
    'REQUEST_URI' => '/weather/forecast?city=Tokyo&name=post_form_data',
    'REQUEST_METHOD' => 'POST',
    'SCRIPT_NAME' => '/weather/forecast',
    'SCRIPT_FILENAME' => 'test/persist_test_case.php',
    'PHP_SELF' => '/weather/forecast',
    'QUERY_STRING' => 'city=Tokyo&name=post_form_data',
    'HTTP_CACHE_CONTROL' => 'no-cache',
    'HTTP_POSTMAN_TOKEN' => '8075ab05-fe3b-4f22-837b-3cf9686480f4',
    'HTTP_USER_AGENT' => 'PostmanRuntime/7.6.0',
    'HTTP_ACCEPT' => '*/*',
    'HTTP_HOST' => 'localhost:8000',
    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate',
    'CONTENT_TYPE' => 'multipart/form-data; boundary=--------------------------012130098398652050048413',
    'HTTP_CONTENT_TYPE' => 'multipart/form-data; boundary=--------------------------012130098398652050048413',
    'CONTENT_LENGTH' => '310',
    'HTTP_CONTENT_LENGTH' => '310',
    'HTTP_CONNECTION' => 'keep-alive',
    'REQUEST_TIME_FLOAT' => 1550964445.642919,
    'REQUEST_TIME' => 1550964445,
    'argv' => 
    array (
      0 => 'city=Tokyo&name=post_form_data',
    ),
    'argc' => 1,
  ),
  'headers' => 
  array (
    'cache-control' => 'no-cache',
    'Postman-Token' => '8075ab05-fe3b-4f22-837b-3cf9686480f4',
    'User-Agent' => 'PostmanRuntime/7.6.0',
    'Accept' => '*/*',
    'Host' => 'localhost:8000',
    'accept-encoding' => 'gzip, deflate',
    'content-type' => 'multipart/form-data; boundary=--------------------------012130098398652050048413',
    'content-length' => '310',
    'Connection' => 'keep-alive',
  ),
  'input' => '',
);