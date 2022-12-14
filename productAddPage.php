<!DOCTYPE html>
<html lang="en">
<?php
include 'types.php';
?>

<head>
<link rel="stylesheet" href="styles.css">  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(document).on('change', '.productSwitcher', function() {
      var target = $(this).data('target');
      var show = $("option:selected", this).data('show');
      $(target).children().addClass('hide');
      $(show).removeClass('hide');
    });
    // possible way to require changing fields... other idea is to use switch statement to make one required and rest not

//     $(document).ready(function() {
//       $('.productSwitcher').trigger('change');
//     });

//     if($(".productType").val().length!=0)
// {
//     formsubmit();
// }
// else
// {
//     alert("You left the required field blank");
// }
  </script>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>  
</head>
<body>
  <form action='addHolder.php' method='post' name='newProduct' id='newProduct'>
    SKU <input type="number" name="sku" id= "sku" required>
    <br>
    Name: <input type="text" name="name" id="name" required>
    <br>
    Price:<input type="number" name="price" id="price" required>
    <br>
    Type Switcher
    <select class= "productSwitcher" id="productType" name="productType" data-target=".productType">
      <option value="">Select...</option>
      <option value="dvd" data-show=".dvd">DVD</option>
      <option value="book" data-show=".book">Book</option>
      <option value="furniture" data-show=".furniture">Furniture</option>
    </select>
    <div class="productType" id= "productTypeId">
      <div class="dvd hide">Please, provide size<br>
        Size:MB<input type="number" name="size" id="size"></input></div>
      <div class="book hide">Please, provide weight<br>
        Weight:Kg<input type="number" name="weight" id="weight"></input></div>
      <div class="furniture hide">Please, provide dimensions<br>
      Height:cm<input type="number" name="height" id="height"> <br>
      Width:cm<input type="number" name="width" id="width"> <br>
      Length:cm<input type="number" name="length" id="length"></div>
      
    </div>
    <label for="submit"></label>
                    <input type="submit" name="submit" value="Submit" />
  <br>
  <a href="createGallery.php"> Cancel </a>
  </form>
</body>

</html>