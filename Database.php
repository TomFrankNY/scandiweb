<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

class Database
{

    protected $db_host;
    protected $db_user;
    protected $db_password;
    protected $db_db;
    static public $db = null; // just an instantiation of this Database Class - no more no less.
    public $mysqli = null; // connection to the database this is everything

    private function __construct()
    {
        $this->db_host = 'localhost:8889';
        $this->db_user = 'root';
        $this->db_password = 'root';
        $this->db_db = 'cartDB';
        $this->connect();
    }

    public function connect()
    {
        $this->mysqli = mysqli_connect(
            $this->db_host,
            $this->db_user,
            $this->db_password,
            $this->db_db
        );
        if ($this->mysqli->connect_error) {
            echo 'Errno: ' . $this->mysqli->connect_errno;
            echo '<br>';
            echo 'Error ' . $this->mysqli->connect_error;
            exit();
        }
    }
    // use :: for static CALL
    public static function getInstance()
    {
        if (!Database::$db) self::$db = new Database();
        return self::$db;
    }

    function addDvd($properties)
    {
        $addDvd = "INSERT INTO DVD (productId, size) VALUES (?, ?);";
        $result = $this->mysqli->prepare($addDvd);
        $result->bind_param('ss', $properties['productId'], $properties['size']);
        if ($result->execute()) {
            echo "DVD added successfully. The Id of the DVD is:" . $result->insert_id;
        } else {
            echo "there was an error adding the DVD: " . $this->mysqli->error;
        };
    }

    function addBook($properties)
    {
        $addBook = "INSERT INTO book (productId, weight) VALUES (?, ?);";
        $result = $this->mysqli->prepare($addBook);
        $result->bind_param('ss', $properties['productId'], $properties['weight']);
        try {
            $result->execute();
        } catch (Exception $e) {
            echo "there was an error adding the Book: " . $e;
        }
        echo "Book added successfully. The Id of the Book is:" . $result->insert_id;
    }

    function addFurniture($properties)
    {
        $addFurniture = "INSERT INTO furniture (productId, height, width, length) VALUES (?, ?, ?, ?);";
        $result = $this->mysqli->prepare($addFurniture);
        $result->bind_param('ssss', $properties['productId'], $properties['height'], $properties['width'], $properties['length']);
        if ($result->execute()) {
            echo "Furniture added successfully. The Id of the Furniture is:" . $result->insert_id;
        } else {
            echo "there was an error adding the Furniture" . $this->mysqli->error;
        }
    }

    function addProduct($properties)
    {
        $addProduct = "INSERT INTO products (sku, name, price, productType) VALUES (?, ?, ?, ?);";
        $result = $this->mysqli->prepare($addProduct);
        $result->bind_param('ssss', $properties['sku'], $properties['name'], $properties['price'], $properties['productType']);
        if ($result->execute()) {
            return $result->insert_id;
        } else {
            return $result->$php_errormsg;
        }
    }

    function deleteProduct($id)
    {
        
        $query = "DELETE FROM products WHERE productId = ?";
        $result = $this->mysqli->prepare($query);
        $result->bind_param("i", $id);
        $result->execute();
        if ($result) {
            echo "product dropped successfully";
        } else {
            echo  "there was an error dropping the product";
        }
        // $result->close();
        // $query = "DELETE FROM `DVD` WHERE `productId` = '$id'";
        // $result = $this->mysqli->prepare($query);
        // $result->bind_param("s", $id);
        // $result->execute();
        // if ($result) {
        //     echo "product dropped successfully";
        // } else {
        //     echo  "there was an error dropping the product";
        // }
        
    }

    function selectProducts()
    {
        $query = "SELECT *  
    FROM products
    LEFT JOIN DVD
    ON products.productId = DVD.productId
    LEFT JOIN book
    ON products.productId = book.productId
    LEFT JOIN furniture
    ON products.productId = furniture.productId;";

        $result = $this->mysqli->query($query);
        return $result;
    }
};