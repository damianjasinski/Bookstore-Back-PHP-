<?php
    //Headers
    header('Acces-Control-Allow-Origin: *');
    header('COntent-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Book.php';

    //Instantiate DB & connect to it
    $database = new Database();
    $db = $database -> connect();


    //Instantiate Book object
    $book = new Book($db);

    //book query
    $result = $book -> read();

    //Get row count
    $num = $result -> rowCount();

    //Check if any posts
    if($num > 0) {
        $books_arr = array();
        $books_arr['data'] = array();
        
        while($row = $result -> fetch(PDO::FETCH_ASSOC)) {

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

        //Turn to JSON & output
        echo json_encode($books_arr);

    } 
    else {
        echo json_encode((
            array('message' => 'No books found')
        ));
    }