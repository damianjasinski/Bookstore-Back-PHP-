<?php

class User
{

    // db
    private $conn;
    private $table = 'Users';

    //user
    private $firstName;
    private $userId;
    private $secondName;
    private $email;
    private $phoneNumber;



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
        $fetchUserById = "SELECT `firstName`,`secondName`, `email`, `phoneNumber`,`role` FROM `users` WHERE `userId`=:userId";
        $stmt = $this->conn->prepare($fetchUserById);
        $stmt->bindValue(':userId', $this->userId, PDO::PARAM_INT);
        //Execute query
        $stmt->execute();

        //Get row count
        $num = $stmt->rowCount();

        if ($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
            $this->first_name = $firstName;
            $this->second_name = $secondName;
            $this->email = $email;
            $this->phoneNumber = $phoneNumber;
            return true;
        }
        return false;
    }

    public function readAll()
    {

        //Create query
        $fetchAllUsers = "SELECT * FROM `users`";
        $stmt = $this->conn->prepare($fetchAllUsers);
        //Execute query
        $stmt->execute();
        //Get row count
        $num = $stmt->rowCount();

        if ($num > 0) {
            $users_arr = array();
            $users_arr['data'] = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $user_item = array(
                    'userId' => $userId,
                    'firstName' => $firstName,
                    'secondName' => $secondName,
                    'role' => $role,
                    'email' => $email,
                    'phoneNumber' => $phoneNumber,
                    'createdAt' => $createdAt
                );
                array_push($users_arr['data'], $user_item);
            }
            return $users_arr;
        } else
            return false;
    }

    //update user
    public function update($firstName, $secondName, $phoneNumber, $email, $password)
    {
        if ($password == null) {
            $updateUserById = "UPDATE users SET `firstName` = :firstName, `secondName` = :secondName, `email` = :email, `phoneNumber` = :phoneNumber WHERE `userId` =:userId";
            $stmt = $this->conn->prepare($updateUserById);
            $stmt->bindValue(':firstName', htmlspecialchars(strip_tags($firstName, PDO::PARAM_STR)));
            $stmt->bindValue(':secondName', htmlspecialchars(strip_tags($secondName, PDO::PARAM_STR)));
            $stmt->bindValue(':email', htmlspecialchars(strip_tags($email, PDO::PARAM_STR)));
            $stmt->bindValue(':phoneNumber', htmlspecialchars(strip_tags($phoneNumber, PDO::PARAM_INT)));
            $stmt->bindValue(':userId', htmlspecialchars(strip_tags($this->userId, PDO::PARAM_INT)));
            //Execute query
            $stmt->execute();
        } else {
            $updateUserById = "UPDATE users SET `password` = :password, `firstName` = :firstName, `secondName` = :secondName, `email` = :email, `phoneNumber` = :phoneNumber WHERE `userId` =:userId";
            $stmt = $this->conn->prepare($updateUserById);
            $stmt->bindValue(':firstName', htmlspecialchars(strip_tags($firstName, PDO::PARAM_STR)));
            $stmt->bindValue(':secondName', htmlspecialchars(strip_tags($secondName, PDO::PARAM_STR)));
            $stmt->bindValue(':phoneNumber', htmlspecialchars(strip_tags($phoneNumber, PDO::PARAM_INT)));
            $stmt->bindValue(':email', htmlspecialchars(strip_tags($email, PDO::PARAM_STR)));
            $stmt->bindValue(':password', password_hash($password, PASSWORD_BCRYPT), PDO::PARAM_STR);
            $stmt->bindValue(':userId', htmlspecialchars(strip_tags($this->userId, PDO::PARAM_INT)));
            //Execute query
            $stmt->execute();
        }
        return true;
    }



    /**
     * Get the value of userId
     */
    public function getId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */
    public function setId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Set the value of first_name
     *
     * @return  self
     */
    /**
     * Get the value of first_name
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }


    /**
     * Get the value of second_name
     */
    public function getSecondName()
    {
        return $this->secondName;
    }

    /**
     * Set the value of secondName
     *
     * @return  self
     */
    public function setSecondName($secondName)
    {
        $this->secondName = $secondName;

        return $this;
    }

    /**
     * Get the value of phoneNumber
     */
    public function getPhoneNumber()
    {
        return $this->phoneNumber;
    }

    /**
     * Set the value of phoneNumber
     *
     * @return  self
     */
    public function setPhoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
