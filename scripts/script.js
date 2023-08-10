{/* <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> */}
        $(document).on('change', '.productSwitcher', function() {
            var target = $(this).data('target');
            var show = $("option:selected", this).data('show');
            $(target).children().addClass('hide');
            $(target).children().children('input').removeAttr('required');
            $(show).children('input').attr('required', 'true')
            $(show).removeClass('hide');
        });
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
            });
        });
