<?php

class Adress {
     // db
     private $conn;
     private $table = 'Addresses';
 
     //user
     private $id;
     private $city;
     private $userId;
     private $postCode;
     private $country;
     private $street;
     private $buildingNumber;
 
 
 
     //constructor
     public function __construct($db, $userId)
     {
         $this->conn = $db;
         $this->userId = $userId;
     }
 
     //get user from db
     public function read()
     {
         //Create query
         $fetchAddressByUserId = "SELECT `id`,`city`, `userId`, `postCode`, `country`, `street`, `buildingNumber` FROM `addresses` WHERE `userId`=:userId";
         $stmt = $this->conn->prepare($fetchAddressByUserId);
         $stmt->bindValue(':userId', $this->userId, PDO::PARAM_INT);
         //Execute query
         $stmt->execute();
 
         //Get row count
         $num = $stmt->rowCount();
 
         if ($num > 0) {
             $row = $stmt->fetch(PDO::FETCH_ASSOC);
             extract($row);
             $this->id = $id;
             $this->city = $city;
             $this->postCode = $postCode;
             $this->country = $country;
             $this->street = $street;
             $this->buildingNumber = $buildingNumber;
             return true;
         }
         return false;
     }
 
     //update user
//      public function update($firstName, $secondName, $phoneNumber, $email, $password)
//      {
//          if ($password == null) {
//              $updateUserById = "UPDATE users SET `firstName` = :firstName, `secondName` = :secondName, `email` = :email, `phoneNumber` = :phoneNumber WHERE `userId` =:userId";
//              $stmt = $this->conn->prepare($updateUserById);
//              $stmt->bindValue(':firstName', htmlspecialchars(strip_tags($firstName, PDO::PARAM_STR)));
//              $stmt->bindValue(':secondName', htmlspecialchars(strip_tags($secondName, PDO::PARAM_STR)));
//              $stmt->bindValue(':email', htmlspecialchars(strip_tags($email, PDO::PARAM_STR)));
//              $stmt->bindValue(':phoneNumber', htmlspecialchars(strip_tags($phoneNumber, PDO::PARAM_INT)));
//              $stmt->bindValue(':userId', htmlspecialchars(strip_tags($this->userId, PDO::PARAM_INT)));
//              //Execute query
//              $stmt->execute();
//          }
//          else 
//          {
//              $updateUserById = "UPDATE users SET `password` = :password, `firstName` = :firstName, `secondName` = :secondName, `email` = :email, `phoneNumber` = :phoneNumber WHERE `userId` =:userId";
//              $stmt = $this->conn->prepare($updateUserById);
//              $stmt->bindValue(':firstName', htmlspecialchars(strip_tags($firstName, PDO::PARAM_STR)));
//              $stmt->bindValue(':secondName', htmlspecialchars(strip_tags($secondName, PDO::PARAM_STR)));
//              $stmt->bindValue(':phoneNumber', htmlspecialchars(strip_tags($phoneNumber, PDO::PARAM_INT)));
//              $stmt->bindValue(':email', htmlspecialchars(strip_tags($email, PDO::PARAM_STR)));
//              $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
//              $stmt->bindValue(':userId', htmlspecialchars(strip_tags($this->userId, PDO::PARAM_INT)));
//              //Execute query
//              $stmt->execute();
//          }
//          return true;
//      }
 
 




     /**
      * Get the value of id
      */ 
     public function getId()
     {
          return $this->id;
     }

     /**
      * Set the value of id
      *
      * @return  self
      */ 
     public function setId($id)
     {
          $this->id = $id;

          return $this;
     }

     /**
      * Get the value of city
      */ 
     public function getCity()
     {
          return $this->city;
     }

     /**
      * Set the value of city
      *
      * @return  self
      */ 
     public function setCity($city)
     {
          $this->city = $city;

          return $this;
     }

     /**
      * Get the value of postCode
      */ 
     public function getPostCode()
     {
          return $this->postCode;
     }

     /**
      * Set the value of postCode
      *
      * @return  self
      */ 
     public function setPostCode($postCode)
     {
          $this->postCode = $postCode;

          return $this;
     }

     /**
      * Get the value of country
      */ 
     public function getCountry()
     {
          return $this->country;
     }

     /**
      * Set the value of country
      *
      * @return  self
      */ 
     public function setCountry($country)
     {
          $this->country = $country;

          return $this;
     }

     /**
      * Get the value of street
      */ 
     public function getStreet()
     {
          return $this->street;
     }

     /**
      * Set the value of street
      *
      * @return  self
      */ 
     public function setStreet($street)
     {
          $this->street = $street;

          return $this;
     }

     /**
      * Get the value of buildingNumber
      */ 
     public function getBuildingNumber()
     {
          return $this->buildingNumber;
     }

     /**
      * Set the value of buildingNumber
      *
      * @return  self
      */ 
     public function setBuildingNumber($buildingNumber)
     {
          $this->buildingNumber = $buildingNumber;

          return $this;
     }
}