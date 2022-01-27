<?php
//Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../config/Database.php';
include_once '../../../models/User.php';
require __DIR__ . '../../../../auth/Auth.php';
require __DIR__ . '../../../../util/msg.php';


$returnData = [
    "success" => 0,
    "status" => 401,
    "message" => "Unauthorized"
];
//Instantiate DB & connect to it
$database = new Database();
$conn = $database->connect();


$allHeaders = getallheaders();
$auth = new Auth($conn, $allHeaders);

// IF REQUEST METHOD IS NOT EQUAL TO GET
if ($_SERVER["REQUEST_METHOD"] != "GET") {
    $returnData = msg(0, 404, 'Page Not Found!');
}

else {
    $user = $auth->isAuth();  
    if (strcmp($user['user']['role'], 'admin') == 0) {
        $userId = $user["user"]["userId"];
        $user = new User($conn, $userId);
        $result = $user->readAll();
        if ($result == false) {
            $returnData = msg(0, 422, 'Read failed');
        } else {
            $returnData = msg(1, 200, 'Success', $result);
        }
    }
}




echo json_encode($returnData);
