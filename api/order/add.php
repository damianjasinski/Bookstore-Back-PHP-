<?php
//Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Order.php';
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

// GET DATA FROM REQUEST
$data = json_decode(file_get_contents("php://input"));

// IF REQUEST METHOD IS NOT EQUAL TO POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    $returnData = msg(0, 404, 'Page Not Found!');
}

$user = $auth->isAuth();

if ($user) {
    if (!isset($data->bookId)) {
        $returnData = msg(0, 422, 'Need bookId');
    } else {
        $duplicateFlag = 0;
        $userId = $user["user"]["userId"];
        $order = new Order($conn, $userId);
        //check if user has already active order of chosen book
        $checkForDuplicateOrder = $order->readSingle();
        if ($checkForDuplicateOrder) {
            extract($checkForDuplicateOrder);
            if ($bookId == $data->bookId) {
                $returnData = msg(0, 422, 'You have already ordered this book');
                $duplicateFlag = 1;
            }
        }
        if ($duplicateFlag == 0) {
            //check if book is available
            $book = new Book($conn, $userId);
            $checkIfAvailable = $book->readSingle($data->bookId);
            if ($checkIfAvailable) {
                extract($checkIfAvailable);
                if ($available == 1) {
                    $result = $order->add($userId, $data->bookId);
                    //query address
                    if ($result == false) {
                        $returnData = msg(0, 422, 'Order failed ');
                    } else {
                        $returnData = msg(1, 200, 'Success');
                    }
                } else {
                    $returnData = msg(0, 422, 'Book is not available');
                }
            } else $returnData = msg(0, 422, 'Book doesnt exist');
        }
    }
}


echo json_encode($returnData);
