<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: 'GET, POST, OPTIONS'");
header("Content-Type: multipart/form-data");
header("Content-Type: application/json; charset=utf-8");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Requested-With");


if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200);
    die;
}
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    if(isset($_SERVER['CONTENT_TYPE']) && !str_contains($_SERVER['CONTENT_TYPE'], 'multipart/form-data')) {
        $_POST = json_decode(file_get_contents('php://input'), true);
    }
}

//echo json_encode($_POST); die;

require_once dirname(__DIR__) . '/config/init.php';
require_once LIBS . '/functions.php';
require_once CONFIG . '/routes.php';

new \mvc\App();