<?php
require_once 'addProduct.php';

?>
<html lang="en">
    <body>
<?php
// checked what request_method was
// var_dum  p($_SERVER);

// $result =[];

    if (isset($_POST['submit'])){

        $sku = $_REQUEST['sku'];
        $name = $_REQUEST['name'];
        $price = $_REQUEST['price'];
        $productType = $_REQUEST['productType'];
        
        if ($_POST['productType'] == 'dvd') {
           
            $dimensions = $_POST['size'];

                // $size = $_REQUEST['']
                // foreach ($_POST)
            
        } elseif ($_POST['productType'] == 'book') {
            echo $_POST['weight'];
        }   else {
            echo $_POST['height'];
        }

        if (isset($_POST['dvd'])){
            $size [ $_POST['size]']];
            echo $_POST['size'];
        }
        addProduct($sku, $name, $price);
        // if(!$sku) {
        //     $errors[] = 'Product sku is required';
        // }

        }
        // display error
        //   foreach ($errors as $error):
        //         echo $error ;
        //          endforeach; 
    ?>

    </div>
</body>
</html>