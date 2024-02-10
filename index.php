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
                    <!-- <div class="fcard">
                        <div class="badge">Hot</div>
                        <div class="product-tumb">
                            <img src="https://i.imgur.com/xdbHo4E.png" alt="">
                        </div>
                        <div class="product-details">
                            <span class="product-catagory">Women,bag</span>
                            <h4><a href="">Women leather bag</a></h4>
                             <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p> -->
                    <!-- <div class="product-bottom-details">
                                <div class="product-price"><small>$96.00</small>$230.99</div>
                            </div>
                        </div>
                    </div>
                    <div class="fcard">

                    </div>
                    <div class="fcard">

                    </div> -->
                </div>
            </div>
        </section>
    </div>
</body>

</html>