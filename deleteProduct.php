<?php
require_once "connect.php";

function deleteProduct($sku)
{
    $mysqli = connect();
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