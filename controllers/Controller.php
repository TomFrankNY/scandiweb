<?php
require __DIR__ . '/../models/Dvd.php';
require __DIR__ . '/../models/Book.php';
require __DIR__ . '/../models/Furniture.php';

class Controller
{
    public function gallery(Router $router)
    {
        $router->renderView('gallery');
    }

    public function add(Router $router)
    {
        $router->renderView('productAddPage');
        if (isset($_POST['submit'])) {
            $properties = $_REQUEST;
            $redirect_gallery = '../view/gallery.php';
            $product = new $_REQUEST['productType']($properties);
             }
        $product->save();
        header('Location: ' . $redirect_gallery);
        echo "Product added successfully!";
    }
    function drop()
    {
        if (isset($_POST['delete'])) {
            $db = Database::getInstance();
            $redirect_gallery = '/gallery';
            if (!empty($_POST['delete_checkbox'])) {
                $ids = $_POST['delete_checkbox'];
                foreach ($ids as $id) {
                    $id = mysqli_real_escape_string($db->mysqli, $id);
                    $db->deleteProduct($id);
                }
            }
            header('Location: ' . $redirect_gallery);
        }
    }
    function checkSku()
    {
        $sku = ($_POST['sku']);
        $db = Database::getInstance();
        $result = $db->checkSku($sku);
        if (mysqli_num_rows($result) > 0) {
            echo 'SKU_EXISTS';
        } else {
            echo 'SKU_AVAILABLE';
        }
    }
}
