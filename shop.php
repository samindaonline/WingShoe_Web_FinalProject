<!DOCTYPE html>
<html>
    <head>
        <title>Shop</title>
        <link rel="stylesheet" href="css_files/main.css">
        <link rel="stylesheet" href="css_files/shop.css">
    </head>
    <body>
        <?php
            include "assets/header.php";
            require "php_files/php_shop.php";
        ?>
        <div id="maincontent">
            <section id="shopheading">

            </section>
            <section id="shopcontainer">
                <div class="filter-section">

                </div>
                <?php shop(); ?>
            </section>
        </div>
    </body>
</html>