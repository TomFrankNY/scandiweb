    <?php
    include 'DTO/addProduct.php';
    ?>
<html>
<body>
<?php
    if (isset(($_POST['submit']))){
        echo $_POST['sku'];
        echo $_POST['name'];
        echo $_POST['price'];
        echo $_POST['productType'];

        if ($_POST['productType'] == 'dvd'){
            echo $_POST['size'];
            # code...
        } elseif ($_POST['productType'] == 'book'){
            echo $_POST['weight'];
        } else {
            echo $_POST ['height'];
        }
        //WRITE INTO THE DATABASE
        addProduct('sku','name','price');
    }
    ?>
</body>
</html>

<!-- sku, name, price, type_id, product_type_id -->