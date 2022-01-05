<?php
//Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/User.php';
require __DIR__ . '../../../auth/Auth.php';
require __DIR__ . '../../../util/msg.php';


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

// GET DATA FROM REQUEST
$data = json_decode(file_get_contents("php://input"));

// IF REQUEST METHOD IS NOT EQUAL TO POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $returnData = msg(0, 404, 'Page Not Found!');
}
$user = $auth->isAuth();
if ($user) {
    $userId = $user["user"]["userId"];
    $user = new User($conn, $userId);
    $user->update($data->firstName, $data->secondName, $data->phoneNumber, $data->email, $data->password);
    $returnData = msg(1, 200, 'Success');
    $user->read();
}


echo json_encode($returnData);
