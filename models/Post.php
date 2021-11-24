<?php

class Post {
    // db
    private $conn;
    private $table = 'posts';

    //post
    public $id;
    public $category_id;
    public $category_name;
    public $title;
    public $body;
    public $author;
    public $created_at;

    //constructor
    public function __construct($db) {
        $this -> conn = $db;
    }

    //get posts
    public function read() {
        $query = 'SELECT '
    }



}