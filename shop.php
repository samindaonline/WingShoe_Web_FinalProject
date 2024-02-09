<!DOCTYPE html>
<html>

<head>
    <title>Shop</title>
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>
    <link rel="stylesheet" href="css_files/shop.css">
</head>

<body>
    <?php
    include "assets/header.php";
    require "php_files/php_shop.php";
    ?>
    <div class="maincontent">
        <section id="shopheading">
            <div class="hcol1">
                <h1>Shop</h1>
            </div>

            <div class="hcol2">
                <div class="search-box">
                    <button class="btn-search"><i class="fa fa-search"></i></button>
                    <input type="text" class="input-search" placeholder="Type to Search...">
                </div>
            </div>
        </section>

        <section id="shopcontainer">
            <div class="productrow">
                <div class="product-card">
                    <div class="box_main">
                        <h4 class="shirt_text">Man T -shirt</h4>
                        <p class="price_text">Price <span style="color: #262626;">$ 30</span></p>
                        <div class="tshirt_img"><img src="assets/images/noimg.jpg"></div>
                        <div class="btn_main">
                            <div class="buy_bt"><a href="#">Add Cart</a></div>
                            <div class="seemore_bt"><a href="#">See More</a></div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
</body>

</html>