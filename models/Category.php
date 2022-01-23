<?php

class Category
{
    // db
    private $conn;
    private $table = 'Categories';
    private $userId;

    //constructor
    public function __construct($db, $userId)
    {
        $this->conn = $db;
        $this->userId = $userId;
    }

    //get books
    public function readAll()
    {

        //Create query
        $fetchCategories = "SELECT `id`, `name` FROM `categories`";
        $stmt = $this->conn->prepare($fetchCategories);
        //Execute query
        $stmt->execute();

        //Get row count
        $num = $stmt->rowCount();

        if ($num > 0) {
            $categories_arr = array();
            $categories_arr['data'] = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $category_item = array(
                    'id' => $id,
                    'name' => $name,
                );
                array_push($categories_arr['data'], $category_item);
            }
            return $categories_arr;
        } else
            return false;
    }

   
}
