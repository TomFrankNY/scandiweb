<!-- create the header -->
<?php
include 'DTO/selectProducts.php';
?>
<html>

<head>
    <title>Web Lesson Tutorial | Simple PHP Mysql Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- link to add product page -->
    <a href="productAddPage.php">ADD</a>
    <!-- NEED TO ADD LINK TO DELETE BUTTON -->
</head>
<?php
function createGallery($mysqli)
{
    $result = selectProducts($mysqli);
    if ($result->num_rows > 0) {
?>
        <!-- create the body -->

        <body>
            <div>
                <form action="form.php" method="post">
                    <?php
                    //output data of each row
                    while ($row = $result->fetch_assoc()) {
                    ?>
                        <label for="checkbox"><?php echo $row["sku"], $row["name"], -$row["price"], -$row["type_id"]  ?> Delete </label>
                        <input type="checkbox" name="delete_checkbox[]" class="delete-checkbox" value="<?php echo $row["sku"] ?>">
                        <br>
                    <?php }

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
<!DOCTYPE html>