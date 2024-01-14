<!DOCTYPE html>
<html>
    <head>
        <title>Manage Shoe</title>
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
            <section id="manageshopcontainer">
                
                <?php manageshoe(); ?>
                
            </section>
        </div>
    </body>
</html>