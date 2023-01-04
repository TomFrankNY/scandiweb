<?php
require_once "connect.php";
    function addProduct($sku, $name, $price)
    {
        $mysqli = connect();
        $addProduct = "INSERT INTO products (sku, name, price, type_id, product_type_id) VALUES ($sku, $name, $price, 1, 1);";
    // where will the hardcoded values come from ? how did he know they wouldn't come from there
        $result = $mysqli->query($addProduct);
        
     if ($result) {
         echo "product added successfully";
        } else {
            echo "there was an error adding the product: ";
        };

    // $addProduct = "INSERT INTO `products` ";
    // $addProduct.= "(`sku`, `name`, `price`, `type_id`, `product_type_id`)"; 
    // $addProduct.= "VALUES ";
    // $addProduct.= "(";
    // $addProduct.= "'".$record['sku']."',";
    // $addProduct.= "'".$record['name']."',";
    // $addProduct.= "'".$record['price']."',";
    // $addProduct.= "'".$record[1]."',";
    // $addProduct.= "'".$record[1]."', ";
    // $addProduct.=");";
 
//     $result = $mysqli->query($addProduct);
//     echo "product added successfully";
//     // header('location:index.php');

// if (!$result){
//     echo "there was a problem adding product";
//     return $mysqli;
};
    