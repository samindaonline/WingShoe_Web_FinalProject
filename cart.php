<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Cart</title>
    <link rel="stylesheet" href="css_files/main.css">
</head>

<body>
    <?php
    include "assets/header.php";
    require "php_files/php_shop.php";
    ?>

    <div class="maincontent">
        <section class="page-header">
            <h2>Your Cart Items</h2>
        </section>
        <section class="cart-table">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="border-0 bg-light">
                            <div class="p-2 px-3 text-uppercase">Product</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Price</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Quantity</div>
                        </th>
                        <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Remove</div>
                        </th>
                    </tr>
                </thead>
                <tbody id="cartitems">
                    <?php cart(); ?>
                </tbody>
            </table>

        </section>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#removeitem").click(function(e) {
                e.preventDefault();
                var transId = $(this).data('transid');
                if (transId !== "") {
                    $.ajax({
                        url: "php_files/php_removecart.php",
                        method: "POST",
                        data: {
                            transId: transId
                        },
                        success: function(response) {

                            var newCount = parseInt($('.cartcount').text()) - 1;
                            $('.cartcount').text(newCount);
                            $('#cartitems').html(response);
                            alert('Item Removed from cart successfully!');

                        },
                    });
                }
            });
        });
    </script>
</body>

</html>