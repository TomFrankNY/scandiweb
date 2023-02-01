<?php
require_once "../Database.php";

function drop()
    {
        if (isset($_POST['remove'])) {
            $db = Database::getInstance();   
            if (!empty($_POST['delete_checkbox'])) {
                $ids = $_POST['delete_checkbox'];
                foreach ($ids as $id) {
                    $db->deleteProduct('products', $id);
                    echo "caca";
                }
            }
        }
    }
    // if (isset($_POST['remove'])) {
    //     $db = new Database();
    //     if (isset($_POST['checkbox'])) {
    //       $ids = $_POST['checkbox'];
    //       foreach ($ids as $id) {
    //         $db->remove_items("table_name", $id);
    //       }
    //       header("Location: index.php");
    //     }
    //   }
?>

