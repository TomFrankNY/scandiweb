<?php
include 'DTO/connect.php';
// is DTO/ necessary there?
function addProduct()
{
    $mysqli = connect();
    $addProduct = "INSERT INTO products (sku, name, price, type_id, product_type_id) VALUES ('sku', 'name', 'price', 1, 1);";
// where will the hardcoded values come from ? how did he know they wouldn't come from there
    $result = $mysqli->query($addProduct);

    if ($result) {
        echo "product added successfully";
    } else {
        echo "there was an error adding the product: ";
    };
}
