<!DOCTYPE html>
<html lang="en">
<?php
// use Database;
require_once '../Database.php';
?>

<head>
    <!-- do i need php on this file? -->
    <link rel="stylesheet" href="../styles.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        $(document).on('change', '.productSwitcher', function() {
            var target = $(this).data('target');
            var show = $("option:selected", this).data('show'); //why did this break? why is data-target is missing?
            $(target).children().addClass('hide');
            $(target).children().children('input').removeAttr('required');
            $(show).children('input').attr('required', 'true')
            $(show).removeClass('hide');
        });

        // handle sku checker on submit ##HOW TO KNOW IN JS WHEN FORM IS SUBMITTED)

        // $(document).on("submit").click(function()
        // {
        $(document).on('change', '#sku', function() {
            $('#sku').blur(function() {
                var sku = $(this).val();

                $.ajax({
                    url: '../check.php',
                    method: 'POST',
                    data: {
                        sku: $('#sku').val(),
                        text: "Thommy knows how to prepare a Mate"
                    },
                    // url: '../Database.php',
                    success: function(data) {
                        if (data === 'SKU_EXISTS') {
                            $('#warning')
                                .css('color', 'red')
                                .html("This sku already exists")
                            $('#submit').attr("disabled", true);
                        } else {
                            console.log(data)
                            $('#warning')
                                .css('color', 'green')
                                .html("sku available")
                            $('#submit').attr("disabled", false);
                        }
                    }
                })
                // .done(function(response){
                //     $('#sku').html(response);
                // });
            });
        });
    </script>

    <!-- how to check if theres no doubles of sku?? -->
    <!-- <script>
        $.ajax({
            'url': '../controllers/add.php',
            'type': 'POST',
            'dataType': ''
        })
        </script> -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="form-group">
                <form action='../controllers/add.php' method='post' id='form'>
                    SKU <input class="form-control" type="text" name="sku" id="sku" required>
                    <span id="warning"></span>
                    <br>
                    Name: <input class="form-control" type="text" name="name" id="name" required>
                    <br>
                    Price: <input class="form-control" type="number" name="price" id="price" min="1" required>
                    <br>
                    Type Switcher
        <select class="productSwitcher form-control" id="productType" name="productType" data-target=".productType" required>
                        <option value="">Select...</option>
                        <option value="dvd" data-show=".dvd">DVD</option>
                        <option value="book" data-show=".book">Book</option>
                        <option value="furniture" data-show=".furniture">Furniture</option>
                    </select>
                    <div class="productType form-group" id="productTypeId">
                        <div class="dvd hide">
                            Please, provide size <br>
                            <span> Size:MB<input class="form-control" type="number" name="size" id="size"></input>
                        </div>
                        </span>

                        <div class=" book hide">Please, provide weight<br> Weight:Kg<input class="form-control" type="number" name="weight" id="weight"></input></div>
                        <div class=" furniture hide">Please, provide dimensions<br>
                            Height:cm<input class="form-control" type="number" name="height" id="height"><br>
                            Width:cm<input class="form-control" type="number" name="width" id="width"><br>
                            Length:cm<input class="form-control" type="number" name="length" id="length">
                        </div>
                    </div>
                    <label for="submit"></label>
                    <input type="submit" name="submit" value="Submit" id="submit" class="btn btn-success form-control" disabled />
                    <a href="gallery.php" class="btn btn-danger form-control"> Cancel</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>