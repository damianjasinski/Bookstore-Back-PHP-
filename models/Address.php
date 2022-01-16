<?php

class Address
{
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
        $fetchAddressByUserId = "SELECT `id`,`city`, `userId`, `postCode`, `country`, `street`, `buildingNumber`, `apartment` FROM `addresses` WHERE `userId`=:userId";
        $stmt = $this->conn->prepare($fetchAddressByUserId);
        $stmt->bindValue(':userId', $this->userId, PDO::PARAM_INT);
        //Execute query
        $stmt->execute();

        //Get row count
        $num = $stmt->rowCount();
        
        if ($num > 0) {
            $address_arr = array();
            $address_arr['data'] = array();
            while( $row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $address_item = array(
                    'id' => $id,
                    'city' => $city,
                    'postCode' => $postCode,
                    'country' => $country,
                    'street' => $street,
                    'buildingNumber' => $buildingNumber,
                    'apartment' => $apartment 
                );
                array_push($address_arr['data'], $address_item);
            }
            return $address_arr;
        }
        else
            return false;
    }
    
    public function add($city, $postCode, $country, $street, $buildingNumber, $apartment) 
    {
        $addAddressToUserId = "INSERT INTO `addresses` (`city`, `userId`, `postCode`, `country`, `street`, `buildingNumber`, `apartment`)
                                VALUES (:city, :userId, :postCode, :country, :street, :buildingNumber, :apartment)";
        $stmt = ($this -> conn) -> prepare($addAddressToUserId);
        // DATA BINDING
        $stmt->bindValue(":city", htmlspecialchars(strip_tags($city)), PDO::PARAM_STR);
        $stmt->bindValue(":userId", htmlspecialchars(strip_tags($this -> userId)), PDO::PARAM_INT);
        $stmt->bindValue(":postCode", htmlspecialchars(strip_tags($postCode)), PDO::PARAM_INT);
        $stmt->bindValue(":country", htmlspecialchars(strip_tags($country)), PDO::PARAM_STR);
        $stmt->bindValue(":street", htmlspecialchars(strip_tags($street)), PDO::PARAM_STR);
        $stmt->bindValue(":buildingNumber", htmlspecialchars(strip_tags($buildingNumber)), PDO::PARAM_STR);
        $stmt->bindValue(":apartment", htmlspecialchars(strip_tags($apartment)), PDO::PARAM_INT);
        $stmt -> execute();
        return true;
    }

    public function update($city, $postCode, $country, $street, $buildingNumber, $id, $apartment) 
    {
        $updateAddressForUserId = "UPDATE addresses SET `city` = ?, `postCode` = ?, `country` = ?, `street` = ?, `buildingNumber` = ? , `apartment` = ?
                                WHERE `userId` =? and `id` =?";
        $stmt = ($this -> conn) -> prepare($updateAddressForUserId);
        // DATA BINDING
        $stmt->bindValue(1, htmlspecialchars(strip_tags($city)), PDO::PARAM_STR);
        $stmt->bindValue(2, htmlspecialchars(strip_tags($postCode)), PDO::PARAM_INT);
        $stmt->bindValue(3, htmlspecialchars(strip_tags($country)), PDO::PARAM_STR);
        $stmt->bindValue(4, htmlspecialchars(strip_tags($street)), PDO::PARAM_STR);
        $stmt->bindValue(5, htmlspecialchars(strip_tags($buildingNumber)), PDO::PARAM_STR);
        $stmt->bindValue(6, htmlspecialchars(strip_tags($apartment)), PDO::PARAM_INT);
        $stmt->bindValue(7, htmlspecialchars(strip_tags($this -> userId)), PDO::PARAM_INT);
        $stmt->bindValue(8, htmlspecialchars(strip_tags($id)), PDO::PARAM_INT);
        $stmt -> execute();
        return true; 
    }

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
