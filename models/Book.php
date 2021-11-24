<?php

class Book {
    // db
    private $conn;
    private $table = 'Books';

    //book
    public $id;
    public $name;
    public $author;
    public $description;
    public $categoryId;
    public $category;
    public $available;
    public $publish_year;

    //constructor
    public function __construct($db) {
        $this -> conn = $db;
    }

    //get book
    public function read() {
        //Create query
        $query = '
        SELECT b.id, b.name, b.author, b.publish_year, c.name as category
        FROM ' . $this -> table . ' as b 
        LEFT JOIN Categories as c ON b.categoryId = c.id
        ORDER BY b.name
        ';

        //prepare statement
        $stmt = $this->conn->prepare($query);
        
        //Execute query
        $stmt->execute();
        return $stmt;
    }



}