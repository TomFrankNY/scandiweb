<?php
require_once "../Database.php";

// function drop()
//     {
    if (isset($_POST['remove'])) {
        $db = Database::getInstance();
        $redirect_gallery = '../view/gallery.php';   
        if (!empty($_POST['delete_checkbox'])) {
            $ids = $_POST['delete_checkbox'];
                foreach ($_POST['delete_checkbox'] as $id) {
                    $id = mysqli_real_escape_string($db->mysqli, $id);
                    $db->deleteProduct($id);
                }
            }
            header('Location: '.$redirect_gallery);
        }
?>