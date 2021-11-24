<?php

class Category {
    // db
    private $conn;
    private $table = 'Categories';

    //book
    public $id;
    public $name;
    public $description;
    public $ageRestriction;

    //constructor
    public function __construct($db) {
        $this -> conn = $db;
    }

    //get book




}