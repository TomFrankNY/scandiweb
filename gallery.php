<?php
function gallery($mysqli)
{
    $query = "SELECT * FROM `products`;";
    $result = $mysqli->query($query);
    if ($result->num_rows > 0) {
        //output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "The name is: " . $row["name"] . "<br>" .
                "The price is: " . $row["price"] . "<br>" .
                "The type is: " . $row["type_id"] . "<br>";
        }
    }
    echo 'Success: A proper connection to MySQL was made.';
    echo '<br>';
}
?>
<!DOCTYPE html>
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
            <input type="checkbox" name="checkbox_name" value="checkox_value" class= "delete-checkbox">
            <input type="submit">
        </form>
    </div>
</body>
</html>