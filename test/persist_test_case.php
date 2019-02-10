<?php

$name = 'simple_get'; // this variable is changed for every test case

require_once __DIR__ . '/../vendor/autoload.php';

$get     = var_export($_GET, true);
$post    = var_export($_POST, true);
$request = var_export($_REQUEST, true);
$headers = apache_request_headers();

$globals = [
    'get'     => $_GET,
    'post'    => $_POST,
    'request' => $_REQUEST,
    'server'  => $_SERVER,
    'headers' => getallheaders(),
    'input'   => file_get_contents('php://input'),
];

$globalsAsString = var_export($globals, true);

$isPostman  = strpos($_SERVER['HTTP_USER_AGENT'], 'PostmanRuntime') !== false;
$isPhp2Curl = stripos($_SERVER['HTTP_USER_AGENT'], 'php2curl') !== false;
$ua         = 'unknown';
if ($isPhp2Curl) {
    $ua = 'php2curl';
}
if ($isPostman) {
    $ua = 'Postman';
}

$testCase = <<<TEST_CASE
<?php
// $ua
// $name test case 
return \$globalsArray = $globalsAsString;
TEST_CASE;

if ($isPostman) {
    file_put_contents(__DIR__ . "/test_cases/$name.php", $testCase);
    file_put_contents(__DIR__ . "/test_cases/postman_$name.php", $testCase);
} else {
    if ($isPhp2Curl) {
        file_put_contents(__DIR__ . "/test_cases/curl_$name.php", $testCase);
    }
}

echo $testCase;


