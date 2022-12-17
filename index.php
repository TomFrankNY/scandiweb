<?php
include 'DTO/connect.php';
include 'createGallery.php';
include 'DTO/addProduct.php';
$mysqli = connect();
// createAddProductPage();
createGallery($mysqli);
$mysqli->close();

?>