<?php
include 'connect.php';
include 'gallery.php';
include 'addProduct.php';
include 'deleteProduct.php';
$mysqli = connect();
gallery($mysqli);
deleteProduct($mysqli, 10);
$mysqli->close();