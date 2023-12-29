<!DOCTYPE html>
        <link rel="stylesheet" href="css_files/nav.css">
        <?php require "php_files/php_login.php"; ?>
    <header>
        <div class="container">
            <nav>
                <div class="imglogo"><img src="assets/logo/WingShoelogo.png" alt="logo"></div>
                <div class="navlist">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Shop</a></li>
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
                        <span class="cartcount">0</span>
                        <img src="assets/icon/shoppingcart.png" alt="cart">
                    </div>
                </div>
            </nav>
        </div>
</header>