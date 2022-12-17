<?php
function selectProducts($mysqli){
    $query = "SELECT * FROM `products`;";
    $result = $mysqli->query($query);
    return $result;
}
    ?>
    
    <!-- create mysqli
    send mysqli to createGallery function/
    create function createGallery & receive $mysqli
call selectProducts to send $mysqli/ 
create selectProducts to receive $mysqli -->