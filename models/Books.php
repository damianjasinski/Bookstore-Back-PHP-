<?php

class Book
{
    // db
    private $conn;
    private $table = 'Books';
    private $userId;

    //constructor
    public function __construct($db, $userId)
    {
        $this->conn = $db;
        $this->userId = $userId;
    }

    //get books
    public function readAll()
    {

        //Create query
        $fetchBooks = '
        SELECT b.id, b.name, b.author, b.publishYear, b.description, b.available, c.name as category
        FROM ' . $this->table . ' as b 
        LEFT JOIN Categories as c ON b.categoryId = c.id
        ORDER BY b.name
        ';
        $stmt = $this->conn->prepare($fetchBooks);
        //Execute query
        $stmt->execute();

        //Get row count
        $num = $stmt->rowCount();

        if ($num > 0) {
            $books_arr = array();
            $books_arr['data'] = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $book_item = array(
                    'id' => $id,
                    'name' => $name,
                    'author' => $author,
                    'description' => $description,
                    'category' => $category,
                    'available' => $available,
                    'publishYear' => $publishYear
                );
                array_push($books_arr['data'], $book_item);
            }
            return $books_arr;
        } else
            return false;
    }

    public function readSingle($bookId)
    {

        //Create query
        $fetchBookByBookId = "SELECT `name`, `author`, `description`, `categoryId`,`available`,`publishYear` FROM `books` WHERE `id`= ?";
        $stmt = $this->conn->prepare($fetchBookByBookId);
        $stmt->bindValue(1, htmlspecialchars(strip_tags($bookId)), PDO::PARAM_INT);
        //Execute query
        $stmt->execute();

        //Get row count
        $num = $stmt->rowCount();

        if ($num > 0) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            extract($row);
            $book_item = array(
                'name' => $name,
                'author' => $author,
                'description' => $description,
                'categoryId' => $categoryId,
                'available' => $available,
                'publishYear' => $publishYear
            );
            return $book_item;
        } else
            return false;
    }
    public function search($searchPhrase)
    {

        //Create query
        $fetchBooks = "SELECT *
        FROM `books`
        WHERE `name` LIKE ?";
        $searchString = htmlspecialchars(strip_tags($searchPhrase));
        $stmt = $this->conn->prepare($fetchBooks);
        $stmt->bindValue(1, htmlspecialchars(strip_tags($searchPhrase)), PDO::PARAM_STR);
        //Execute query
        $stmt->execute();

        //Get row count
        $num = $stmt->rowCount();

        if ($num > 0) {
            $books_arr = array();
            $books_arr['data'] = array();
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
                $book_item = array(
                    'id' => $id,
                    'name' => $name,
                    'author' => $author,
                    'description' => $description,
                    'available' => $available,
                    'publishYear' => $publishYear
                );
                array_push($books_arr['data'], $book_item);
            }
            return $books_arr;
        } else
            return false;
    }

    public function add($name, $description, $author, $categoryId, $publishYear)
    {

        //Create query
        $addBookQuery = "INSERT INTO `books`(`name`,`description`,`author`,`categoryId`, `publishYear`)
                                 VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($addBookQuery);
        $stmt->bindValue(1, htmlspecialchars(strip_tags($name)), PDO::PARAM_STR);
        $stmt->bindValue(2, htmlspecialchars(strip_tags($description)), PDO::PARAM_STR);
        $stmt->bindValue(3, htmlspecialchars(strip_tags($author)), PDO::PARAM_STR);
        $stmt->bindValue(4, htmlspecialchars(strip_tags($categoryId)), PDO::PARAM_INT);
        $stmt->bindValue(5, htmlspecialchars(strip_tags($publishYear)), PDO::PARAM_INT);
        //Execute query
        $stmt->execute();

        return true;
    }

    public function delete($bookId)
    {
        //Create query
        $addBookQuery = "DELETE FROM `books` WHERE `id` = ?";
        $stmt = $this->conn->prepare($addBookQuery);
        $stmt->bindValue(1, htmlspecialchars(strip_tags($bookId)), PDO::PARAM_INT);
        //Execute query
        try {
            $stmt->execute();
        }
        catch(Exception $e) {
           return false;
        }
        return true;
    }
}
