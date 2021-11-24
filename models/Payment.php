<?php

class Payment {
    // db
    private $conn;
    private $table = 'Payment';

    //book
    public $id;
    public $orderId;
    public $ammount;


    //constructor
    public function __construct($db) {
        $this -> conn = $db;
    }

    //get book




}