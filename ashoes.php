<!DOCTYPE html>
<html>
    <head>
        <title>Add Shoes</title>
        <link rel="stylesheet" href="css_files/main.css">
        <link rel="stylesheet" href="css_files/addshoe.css">
    </head>
    <body>
        <?php
            include "assets/header.php";
            require "php_files/php_shop.php";
        ?>
    <div id="maincontent">
        <div class="formbold-main-wrapper">
            <div class="formbold-form-wrapper">
                <form action="" method="POST" enctype="multipart/form-data" >
                <table>
                            <tr>
                                <td>Product ID:</td>
                                <td><input type="text" maxlength="6" name="product_id"></td>
                            </tr>
                            <tr>
                                <td>Product Name:</td>
                                <td><input type="text" size="50" name="name"></td>
                            </tr>
                            <tr>
                                <td>Description:</td>
                                <td><textarea name="description"></textarea></td>
                            </tr>
                            <tr>
                                <td>Category:</td>
                                <td>
                                    <input type="radio" value="Mens" checked name="category">Mens<br> 
                                    <input type="radio" value="women" name="category">Ladies<br>
                                    <input type="radio" value="kids" name="category">Kids
                                </td>
                            </tr>
                            <tr>
                                <td>Price:</td>
                                <td><input type="number" name="price"> Rupees</td>
                            </tr>
                            <tr>
                                <td>Image 1:</td>
                                <td><input type="file" name="photo1"></td>
                            </tr>
                            <tr>
                                <td>Image 2:</td>
                                <td><input type="file" name="photo2"></td>
                            </tr>
                            <tr>
                                <td><input type="submit" value="Save" name="save"></td>
                            </tr>
                        </table>
                    </form>
                    <?php addshoes(); ?>
                </div>
            </div>
        </div>
    </body>
</html>