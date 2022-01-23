<?php
//Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../../config/Database.php';
include_once '../../../models/Books.php';
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

// GET DATA FROM REQUEST
$data = json_decode(file_get_contents("php://input"));

// IF REQUEST METHOD IS NOT EQUAL TO POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $returnData = msg(0, 404, 'Page Not Found!');
}
// CHECKING EMPTY FIELDS
else if (
    !isset($data->bookId)
) {
    $returnData = msg(0, 422, 'Please Fill in all Required Fields!');
}


$user = $auth->isAuth();

if (strcmp($user['user']['role'], 'admin') == 0) {
    $userId = $user["user"]["userId"];
    $book = new Book($conn, $userId);
    $result = $book->delete($data->bookId);
    if ($result !== true) {
        $returnData = msg(0, 422, 'Delete failed', array("data" => "You cannot delete this book due to integrity constraint"));
    } else {
        $returnData = msg(1, 200, 'Success');
    }
}



echo json_encode($returnData);
