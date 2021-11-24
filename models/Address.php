<?php

class Adress {
    // db
    private $conn;
    private $table = 'Addresses';

    //book
    public $id;
    public $city;
    public $userId;
    public $postCode;
    public $country;
    public $street;

    //constructor
    public function __construct($db) {
        $this -> conn = $db;
    }

    //get book




}