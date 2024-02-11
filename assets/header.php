<!DOCTYPE html>

<?php require "php_files/php_login.php";
require "php_files/connection.php";  ?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
<link rel="stylesheet" href="css_files/nav.css">
<link rel="stylesheet" href="css_files/product.css">
<link rel="stylesheet" href="css_files/main.css">

<header>
    <div class="navcontainer">
        <nav>
            <div class="imglogo"><img src="assets/logo/WingShoelogo.png" alt="logo"></div>
            <div class="navlist">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="shop.php">Shop</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="navleft">
                <div class="account">
                    <div class="accgroup">
                        <?php logged(); ?>
                        <!-- <div class="accicon">
                                <img src="assets/icon/user.png" alt="user">
                            </div>
                            <div class="accname">
                                <a href="login.php">Login/Register</a>
                            </div> -->
                    </div>
                </div>
                <div class="cart">
                    <?php cartcount(); ?>
                    <!-- <div class="wrapcart"><span class="cartcount">0</span></div>
                    <img src="assets/icon/shoppingcart.png" alt="cart"> -->
                </div>
            </div>
        </nav>
    </div>
</header>