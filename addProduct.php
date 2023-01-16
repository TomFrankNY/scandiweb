<?php
require_once "connect.php";
function addProduct($properties)
{
    $mysqli = connect();
    $addProduct = "INSERT INTO products (sku, name, price, product_type) VALUES (?, ?, ?, ?);";
    $result = $mysqli->prepare($addProduct);
    $result->bind_param('ssss', $properties['sku'], $properties['name'], $properties['price'], $properties['productType']);
    if ($result->execute()) {
        $properties['productId'] = $result->insert_id;
        if ($properties['productType'] == 'dvd') {
            addDvd($mysqli, $properties);
        } elseif ($properties['productType'] == 'book') {
            addBook($mysqli, $properties);
        }
            else{
                addFurniture($mysqli, $properties);
            }
    };
};

function addDvd($mysqli, $properties)
{
    echo "productId: " . $properties['productId'] . ", size: " . $properties['size'];
    $addDvd = "INSERT INTO DVD (productId, size) VALUES (?, ?);";
    $result = $mysqli->prepare($addDvd);
    $result->bind_param('ss', $properties['productId'], $properties['size']);
    if ($result->execute()) {

        echo "DVD added successfully. The Id of the DVD is:" . $result->insert_id;
    } else {
        echo "there was an error adding the DVD: " . $mysqli->error;
    };
}

function addBook($mysqli, $properties)
{
    echo "productId: " . $properties['productId'] . ", weight: " . $properties['weight'];
    $addBook = "INSERT INTO book (productId, weight) VALUES (?, ?);";
    $result = $mysqli->prepare($addBook);
    $result->bind_param('ss', $properties['productId'], $properties['weight']);
    if ($result->execute()) {

        echo "Book added successfully. The Id of the Book is:" . $result->insert_id;
    } else {
        echo "there was an error adding the Book: " . $mysqli->error;
    };
}

function addFurniture($mysqli, $properties)
{
    echo "productId: " . $properties['productId'] . ", length: " . $properties['length'] . ", height: " . $properties['height'] . ", width: " . $properties['width'];
    $addFurniture = "INSERT INTO furniture (productId, height, width, length) VALUES (?, ?, ?, ?);";
    $result = $mysqli->prepare($addFurniture);
    $result->bind_param('ssss', $properties['productId'], $properties['height'], $properties['width'], $properties['length']);
    if ($result->execute()) {
        echo "Furniture added successfully. The Id of the Furniture is:" . $result->insert_id;
    } else {
        echo "there was an error adding the Furniture" . $mysqli->error;
    }
}
