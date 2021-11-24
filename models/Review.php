<?php

class Review {
    // db
    private $conn;
    private $table = 'Reviews';

    //book
    public $id;
    public $bookId;
    public $userId;
    public $rating;
    public $description;
    public $created_at;

    //constructor
    public function __construct($db) {
        $this -> conn = $db;
    }

    //get book




}