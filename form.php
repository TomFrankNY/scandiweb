<html>
<body>  
the value of the checkbox is: 
<?php   
if (isset($_POST['checkbox_name'])) {
    echo $_REQUEST['checkbox_name'];

    $checkbox_name = $_POST['checkbox_name'];

    $query = "INSERT INTO checkbox (name) VALUES ('$checkbox_name',)";
    $query_run = mysqli_query($con, $query);
    
    if($query_run)
    {
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: form.php");
    }
    else
    {
        $_SESSION['status'] = "Not Inserted";
        header("Location: form.php");
    }
}



?>
<br>
</body>
</html>