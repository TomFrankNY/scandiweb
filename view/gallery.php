<?php
// require_once '../Database.php';
require_once __DIR__.'/../Database.php';
?>
<html lang="en">

<head>
    <title>Web Lesson Tutorial | Simple PHP Mysql Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../styles.css" />

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <a href="../add" class="form-control btn btn-success">Add Product</a>
</head>
<?php
$db = Database::getInstance();
$result = $db->selectProducts();

if ($result->num_rows > 0) {
?>
    <body>
        <div>
            <form method="post" enctype="multipart/form-data" action="/drop" >
                <?php
                while ($row = $result->fetch_assoc()) {
                ?>
                    <div class="col-sm-4" id="borda"> 
                        <label for="checkbox">
                        <?php echo "SKU:", $row["sku"], " <br>Name:", $row["name"], " <br>Price:", $row["price"], "<br>Product-Type:", $row["productType"] ?> <br>Delete </label>
                    <input type="checkbox" name="delete_checkbox[]" class="delete-checkbox form-group" value="<?php echo $row["id"] ?>"> </div>

                <?php
                }
                ?>
                <label for="submit"></label>
                <input type="submit" name="delete" value="Mass Delete" class="form-control btn btn-danger" />
            </form>
        </div>
    </body>

</html>
<?php
}
else {
    
}
?>