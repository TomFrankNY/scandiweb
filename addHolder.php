<?php
require_once 'addProduct.php';

?>
<html lang="en">
    <body>
<?php
// checked what request_method was
// var_dum  p($_SERVER);

// $result =[];

$properties = [];

    if (isset($_POST['submit'])){

        $properties['sku'] = $_REQUEST['sku'];
        $properties['name'] = $_REQUEST['name'];
        $properties['price'] = $_REQUEST['price'];
        $properties['productType'] = $_REQUEST['productType'];
        
        if ($_POST['productType'] == 'dvd') {
            $properties['size'] = $_POST['size'];
            
        } elseif ($_POST['productType'] == 'book') {
            $properties['weight'] = $_POST['weight'];
        }   else {
            $properties['height'] = $_POST['height'];
            $properties['length'] = $_POST['length'];
            $properties['width'] = $_POST['width'];
        }

        addProduct($properties);
    }
    ?>

    </div>
</body>
</html>