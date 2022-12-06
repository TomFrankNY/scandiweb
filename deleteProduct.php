<?php
function deleteProduct($mysqli, $sku)
{

  $dropQuery =  "DELETE FROM products WHERE sku=".$sku;
  $result = $mysqli->query($dropQuery);
  if ($result){
      echo "product dropped successfully";
  } else {
      echo "there was an error dropping the product: ";
  }
}