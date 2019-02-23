<?php
// php2curl
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
    'REMOTE_PORT' => '62813',
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
    'HTTP_HOST' => 'localhost:8000',
    'HTTP_CACHE_CONTROL' => 'no-cache',
    'HTTP_POSTMAN_TOKEN' => '8075ab05-fe3b-4f22-837b-3cf9686480f4',
    'HTTP_USER_AGENT' => 'php2curl Agent / github.com/biganfa/php2curl',
    'HTTP_ACCEPT' => '*/*',
    'HTTP_ACCEPT_ENCODING' => 'gzip, deflate',
    'HTTP_CONNECTION' => 'keep-alive',
    'CONTENT_LENGTH' => '280',
    'HTTP_CONTENT_LENGTH' => '280',
    'HTTP_EXPECT' => '100-continue',
    'CONTENT_TYPE' => 'multipart/form-data; boundary=------------------------9397246ef5d5c206',
    'HTTP_CONTENT_TYPE' => 'multipart/form-data; boundary=------------------------9397246ef5d5c206',
    'REQUEST_TIME_FLOAT' => 1550964993.239214,
    'REQUEST_TIME' => 1550964993,
    'argv' => 
    array (
      0 => 'city=Tokyo&name=post_form_data',
    ),
    'argc' => 1,
  ),
  'headers' => 
  array (
    'Host' => 'localhost:8000',
    'cache-control' => 'no-cache',
    'Postman-Token' => '8075ab05-fe3b-4f22-837b-3cf9686480f4',
    'User-Agent' => 'php2curl Agent / github.com/biganfa/php2curl',
    'Accept' => '*/*',
    'accept-encoding' => 'gzip, deflate',
    'Connection' => 'keep-alive',
    'Content-Length' => '280',
    'Expect' => '100-continue',
    'content-type' => 'multipart/form-data; boundary=------------------------9397246ef5d5c206',
  ),
  'input' => '',
);