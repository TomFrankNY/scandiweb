<?php
require_once 'Database.php';

$sku = ($_POST['sku']);
// $sku = 2;
$db = Database::getInstance();
$result = $db->checkSku($sku);

// // $newVar = $db->checkSku($sku);
// // echo $sku." caca";
// // $checkProduct = "SELECT sku FROM products WHERE sku='$sku'";
// // $check = $this->mysqli->query($checkProduct);
if (mysqli_num_rows($result) > 0) 
   {
    echo 'SKU_EXISTS';
   }
else{
    echo 'SKU_AVAILABLE';
}
   ?>