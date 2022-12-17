<?php
include "connect.php";

function deleteProduct($sku)
{
  $mysqli = connect();
  $dropQuery =  "DELETE FROM products WHERE sku = $sku";
  $result = $mysqli->query($dropQuery);
  if ($result){
      echo "product dropped successfully";
  } else {
      echo "there was an error dropping the product: ";
  }
}