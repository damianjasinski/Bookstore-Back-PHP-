<?php
//Headers
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../../config/Database.php';
include_once '../../models/Address.php';
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
if ($_SERVER["REQUEST_METHOD"] != "GET") {
    $returnData = msg(0, 404, 'Page Not Found!');
}

if ($auth->isAuth()) {


    //Instantiate Book object
    $address = new Adress($conn, $data->userId);

    //query address
    if ($address->read() == false) {
        $returnData = msg(0, 422, 'Address not found');
    } else {
        $address_arr = array();
        $address_arr['data'] = array();
        $address_item = array(
            'id' => $address -> getId(),
            'city' => $address -> getCity(),
            'postCode' => $address -> getPostCode(),
            'country' => $address -> getCountry(),
            'street' => $address -> getStreet(),
            'buildingNumber' => $address -> getBuildingNumber()
        );
        array_push($address_arr['data'], $address_item);
        $returnData = msg(0, 200, 'Success', $address_arr);
    }

}

echo json_encode($returnData);
