<?php
require_once "connect.php";

function deleteProduct($sku)
{
    $mysqli = connect();
    // if this breaks ! update using new logic from https://stackoverflow.com/questions/7537377/how-to-include-a-php-variable-inside-a-mysql-statement
    $dropQuery = "DELETE FROM `products` WHERE `sku` = '$sku'";
    $result = $mysqli->query($dropQuery);
    if ($result) {
        // header('location:index.php');
       echo "product dropped successfully";
    } else  {
       echo  "there was an error dropping the product";
    //    header('location:index.php');
    }
}


?>