<?php
class Cart {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addItem($product_id, $quantity) {
        $query = "INSERT INTO cart (product_id, quantity) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ii", $product_id, $quantity);
        $stmt->execute();
    }

    public function removeItem($item_id) {
        $query = "DELETE FROM cart WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $item_id);
        $stmt->execute();
    }

    public function getTotal() {
        $query = "SELECT SUM(p.price * c.quantity) AS total FROM cart c JOIN products p ON c.product_id = p.id";
        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();
        return $row['total'];
    }
}

abstract class Product {
    protected $sku;
    protected $name;
    protected $price;

    public function __construct($sku, $name, $price) {
        $this->sku = $sku;
        $this->name = $name;
        $this->price = $price;
    }

    abstract public function getUniqueProperty();

    public function getSku() {
        return $this->sku;
    }

    public function getName() {
        return $this->name;
    }

    public function getPrice() {
        return $this->price;
    }
}

class Book extends Product {
    private $weight;

    public function __construct($sku, $name, $price, $weight) {
        parent::__construct($sku, $name, $price);
        $this->weight = $weight;
    }

    public function getUniqueProperty() {
        return "Weight: " . $this->weight . " kg";
    }
}

class DVD extends Product {
    private $size;

    public function __construct($sku, $name, $price, $size) {
        parent::__construct($sku, $name, $price);
        $this->size = $size;
    }

    public function getUniqueProperty() {
        return "Size: " . $this->size . " mb";
    }
}

class Furniture extends Product {
    private $length;
    private $height;
    private $width;

    public function __construct($sku, $name, $price, $length, $height, $width) {
        parent::__construct($sku, $name, $price);
        $this->
