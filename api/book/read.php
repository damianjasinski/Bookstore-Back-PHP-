<?php
//Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Books.php';
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

// IF REQUEST METHOD IS NOT EQUAL TO POST
if ($_SERVER["REQUEST_METHOD"] != "GET") {
    $returnData = msg(0, 404, 'Page Not Found!');
}

$user = $auth->isAuth();

if ($user) {

    $userId = $user["user"]["userId"];
    //Instantiate Book object
    $book = new Book($conn, $userId);

    //book query
    $result = $book->readAll();
    if($result == false) {
        $returnData = msg(0, 422, 'Address not found', array());
    }
    else {
        $returnData = msg(1, 200, 'Success', $result);
    }
}

echo json_encode($returnData);
