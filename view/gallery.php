<?php
include 'header.php';

$db = Database::getInstance();
$result = $db->selectProducts();

if ($result->num_rows > 0) {
?>
        <a href="../add" class="form-control btn btn-success">Add Product</a>
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

<?php
}

include 'footer.php';
?>
