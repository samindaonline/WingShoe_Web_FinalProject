<?php session_start(); ?>

<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" href="css_files/main.css">
</head>

<body>
    <?php
    include "assets/header.php";
    ?>
    <section>
        <div class="mainbanner">
            <div class="mainbanner-left">
                <div class="content-wrap">
                    <h2>Step into Style with Wing Shoe</h2>
                    <!-- <h4>Discover the Perfect Pair for Every Step of Your Journey</h3> -->
                    <p>Step into the world of WingShoe, where fashion takes flight. Explore our curated collection of footwear designed to elevate your every step. From casual kicks to elegant heels, WingShoe has the perfect pair for every occasion. Fly high in fashion with WingShoe today</p>
                    <a class="mainbanner-button btn btn-outline-dark" href="shop.php" role="button">Shop now</a>
                </div>
            </div>
            <div class="mainbanner-right">
                <img src="assets/images/heroimg.jpg" alt="img">
            </div>
        </div>
    </section>
    <div class="maincontent">
        <section>
            <div class="featured">
                <div class="featured-head">
                    <h2>Featured Product</h2>
                    <h4>Elevate your style with our featured products.</h4>
                </div>
                <div class="featured-wrap">
                    <?php require 'php_files/php_shop.php';
                    featuredproduct();
                    ?>
                </div>
            </div>
        </section>
    </div>
</body>

</html>