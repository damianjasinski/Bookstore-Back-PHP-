<?php

class User {
    // db
    private $conn;
    private $table = 'Users';

    //book
    public $id;
    public $firstName;
    public $secondName;
    public $password;
    public $role;
    public $created_at;


    //constructor
    public function __construct($db) {
        $this -> conn = $db;
    }

    //get book




}