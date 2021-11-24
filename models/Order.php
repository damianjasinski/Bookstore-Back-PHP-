<?php

class Order {
    // db
    private $conn;
    private $table = 'Order';

    //book
    public $id;
    public $userId;
    public $bookId;
    public $created_at;
    public $expiration_date;


    //constructor
    public function __construct($db) {
        $this -> conn = $db;
    }

    //get book




}