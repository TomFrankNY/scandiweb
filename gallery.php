<?php
function gallery($mysqli)
{
    $query = "SELECT * FROM `products`;";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            
            ?>
            <label for="checkbox">First name:</label>
                <input type="checkbox" name="checkbox_name" class= "delete-checkbox">
<?php
            echo "The name is: " . $row["name"] . "<br>" .
                "The price is: " . $row["price"] . "<br>" .
                "The type is: " . $row["type_id"] . "<br>";
        }
    }
  
    ?>

    <html>
    <head>
        <title>Webslesson Tutorial | Simple PHP Mysql Shopping Cart</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div>
            <form action="form.php" method ="post>
                <input type="submit">
            </form>
        </div>
    </body>
</html>

<?php
}
?>
<!DOCTYPE html>
