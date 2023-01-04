<?php
require_once 'selectProducts.php'
?>

<html lang="en">

<head>
    <title>Web Lesson Tutorial | Simple PHP Mysql Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- link to add product page -->
    <a href="productAddPage.php">Add</a>
    <!-- NEED TO ADD LINK TO DELETE BUTTON -->
</head>
<?php
function createGallery($mysqli)
{
    $result = selectProducts($mysqli);
    if ($result->num_rows > 0) {
?>
        <body>
            <div>
                <form action="form.php" method="post">
                    <?php
                    // output data of each row
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <label for="checkbox"><?php echo $row["sku"], $row["name"], $row["price"], $row["type_id"] ?> Delete </label>
                        <input type="checkbox" name="delete_checkbox[]" class="delete-checkbox" value="<?php echo $row["sku"] ?>">
                        <br>
                    <?php
                    }
                    ?>
                    <label for="submit"></label>
                    <input type="submit" name="submit" value="Submit" />
    </form>
   </div>
</body>
</html>
<?php
    }
}
?>