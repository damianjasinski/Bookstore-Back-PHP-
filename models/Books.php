<?php

class Book
{
    // db
    private $conn;
    private $table = 'Books';
    private $userId;

    //constructor
    public function __construct($db, $userId)
    {
        $this->conn = $db;
        $this->userId = $userId;
    }

    //get book
    public function read()
    {

        //Create query
        $fetchBooks= '
        SELECT b.id, b.name, b.author, b.publish_year, b.description, b.available, c.name as category
        FROM ' . $this -> table . ' as b 
        LEFT JOIN Categories as c ON b.categoryId = c.id
        ORDER BY b.name
        ';
        $stmt = $this->conn->prepare($fetchBooks);
        //Execute query
        $stmt->execute();

        //Get row count
        $num = $stmt->rowCount();

        if ($num > 0) {
            $books_arr = array();
            $books_arr['data'] = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $book_item = array(
                    'id' => $id,
                    'name' => $name,
                    'author' => $author,
                    'description' => $description,
                    'category' => $category,
                    'available' => $available,
                    'publish_year' => $publish_year
                );
                array_push($books_arr['data'], $book_item);
            }
            return $books_arr;
        } else
            return false;
    }
}
