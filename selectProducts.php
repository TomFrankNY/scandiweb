<?php
function selectProducts($mysqli)
{
    $query = "SELECT * FROM `products`;";
    $result = $mysqli->query($query);
    return $result;
}
?>