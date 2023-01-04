<?php
require_once 'createGallery.php';
require_once 'connect.php';
require_once 'addProduct.php';

$mysqli = connect();
createGallery($mysqli);
// $mysqli->close();
?>