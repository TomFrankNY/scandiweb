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

    // public function getTotal() {
    //     $query = "SELECT SUM(p.price * c.quantity) AS total FROM cart c JOIN products p ON c.product_id = p.id";
    //     $result = $this->conn->query($query);
    //     $row = $result->fetch_assoc();
    //     return $row['total'];
    // }
}