<?php

class Contact {
    // db
    private $conn;
    private $table = 'Contacts';

    //book
    public $id;
    public $userId;
    public $email;
    public $phone_number;


    //constructor
    public function __construct($db) {
        $this -> conn = $db;
    }

    //get book




}