<?php
require __DIR__.'/../models/Dvd.php';
require __DIR__.'/../models/Book.php';
require __DIR__.'/../models/Furniture.php';

class Controller
{
    public function gallery(Router $router)
    {
        $router->renderView('gallery');
    }

    public function add(Router $router)
    {  
        $router->renderView('productAddPage');
        if (isset($_POST['submit'])) 
        {
            $properties['sku'] = $_REQUEST['sku'];
            $properties['name'] = $_REQUEST['name'];
            $properties['price'] = $_REQUEST['price'];
            $properties['productType'] = $_REQUEST['productType'];
            $redirect_gallery = '../view/gallery.php';
            echo "isset";
            if ($properties['productType'] == 'dvd') {
                $properties['size'] = $_POST['size'];
                $product = new Dvd($properties);
            } elseif ($properties['productType'] == 'book') {
                $properties['weight'] = $_POST['weight'];
                $product = new Book($properties);
            } else {
                $properties['height'] = $_POST['height'];
                $properties['length'] = $_POST['length'];
                $properties['width'] = $_POST['width'];
                $product = new Furniture($properties);
            }
            $product->save();

            header('Location: ' . $redirect_gallery);
            echo "Product added successfully!";
        }
        }
    function drop()
    {
        if (isset($_POST['delete'])) {
            $db = Database::getInstance();
            $redirect_gallery = '/gallery';
            if (!empty($_POST['delete_checkbox'])) {
                $ids = $_POST['delete_checkbox'];
                // foreach ($_POST['delete_checkbox'] as $id) {
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
