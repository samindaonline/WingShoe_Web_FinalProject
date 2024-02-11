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
                <tbody>
                    <?php cart(); ?>
                </tbody>
            </table>

        </section>
    </div>
</body>

</html>