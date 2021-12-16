<?php
//Headers
header('Acces-Control-Allow-Origin: *');
header('COntent-Type: application/json');

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

if ($auth->isAuth()) {


    //Instantiate Book object
    $book = new Book($conn);

    //book query
    $result = $book->read();

    //Get row count
    $num = $result->rowCount();

    //Check if any posts
    if ($num > 0) {
        $books_arr = array();
        $books_arr['data'] = array();

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

            extract($row);
            $book_item = array(
                'id' => $id,
                'name' => $name,
                'author' => $author,
                'category' => $category,
                'publish_year' => $publish_year
            );
            //Push to "data"
            array_push($books_arr['data'], $book_item);
        }
        $returnData = msg(1, 200, 'Success', $books_arr);

        //Turn to JSON & output
        // echo json_encode($books_arr);
    } else {
        $returnData = msg(1, 200, 'No books found');
    }
}

echo json_encode($returnData);
