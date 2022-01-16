<?php

class Payment
{
    // db
    private $conn;
    private $table = 'payment';

    //constructor
    public function __construct($db, $userId)
    {
        $this->conn = $db;
        $this->userId = $userId;
    }

    public function add($orderId, $ammount, $addressId)
    {
        try {
            $addAddressToUserId = "INSERT INTO `payment` (`orderId`, `ammount`, `addressId`, `userId`)
                                VALUES (?, ?, ?, ?)";
            $stmt = ($this->conn)->prepare($addAddressToUserId);
            // DATA BINDING
            $stmt->bindValue(1, htmlspecialchars(strip_tags($orderId)), PDO::PARAM_INT);
            $stmt->bindValue(2, htmlspecialchars(strip_tags($ammount)), PDO::PARAM_STR);
            $stmt->bindValue(3, htmlspecialchars(strip_tags($addressId)), PDO::PARAM_STR);
            $stmt->bindValue(4, htmlspecialchars(strip_tags($this->userId)), PDO::PARAM_INT);

            $stmt->execute();

            $updateOrder = "UPDATE `order` SET `finalized` = ?, `expirationDate` = ? WHERE `orderId` = ?";
            // Declare a date
            $Date = date('Y-m-d');
            // Add days to date 
            $expDate = date('Y-m-d', strtotime($Date . ' + 180 days'));
            $stmt = ($this->conn)->prepare($updateOrder);
            $stmt->bindValue(1, htmlspecialchars(strip_tags(1)), PDO::PARAM_INT);
            $stmt->bindValue(2, htmlspecialchars(strip_tags($expDate)), PDO::PARAM_STR);
            $stmt->bindValue(3, htmlspecialchars(strip_tags($orderId)), PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
