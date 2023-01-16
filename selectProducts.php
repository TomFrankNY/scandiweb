<?php
function selectProducts($mysqli)
{
    $query = "SELECT * 
    FROM products
    LEFT JOIN DVD
    ON products.id = DVD.productId
    LEFT JOIN book
    ON products.id = book.productId
    LEFT JOIN furniture
    ON products.id = furniture.productId;";
    
    $result = $mysqli->query($query);
    return $result; 
}
?>