<?php

function addQuery($mysqli)
{
    $addQuery = "INSERT INTO products (sku, name, price, type_id, product_type_id) VALUES (NULL, 'table', 100, 3, 2);";

    $result = $mysqli->query($addQuery);

    if ($result) {
        echo "product added successfully";
    } else {
        echo "there was an error adding the product: ";
    };
}
