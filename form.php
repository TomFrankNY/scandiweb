<?php
include 'DTO/deleteProduct.php';
?>
<html>
<body>
    the value of the checkbox is:
    <?php
    if (isset($_POST['submit'])) {
        if (!empty($_POST['delete_checkbox'])) {

            foreach ($_POST['delete_checkbox'] as $sku) {
                deleteProduct($sku);
            }
        }
    }
    ?>
    <br>
</body>
</html>