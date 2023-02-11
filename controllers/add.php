<?php
require '../models/Dvd.php';
require '../models/Book.php';
require '../models/Furniture.php';
// test this logic


if (isset($_POST['submit'])) {
    $properties = [];
    $properties['sku'] =$_REQUEST['sku'];
    $properties['name'] =$_REQUEST['name'];
    $properties['price'] = $_REQUEST['price'];
    $properties['productType'] = $_REQUEST['productType'];
    $redirect_gallery = '../view/gallery.php';

    if ($properties['productType'] == 'dvd') {
        echo 'its a dvd';
        $properties['size'] =$_POST['size'];
        $product = new Dvd($properties);
    } elseif ($properties['productType'] == 'book') {
        $properties['weight'] = $_POST['weight'];
        $product = new Book($properties);
    } else {
        $properties['height'] = $_POST['height'];
        $properties['length'] = $_POST['length'];
        $properties['width'] = $_POST['width'];
        $product = new furniture($properties);
    }
    
    $product->save();
    header('Location: '.$redirect_gallery);
    echo "Product added successfully!";
}
?>