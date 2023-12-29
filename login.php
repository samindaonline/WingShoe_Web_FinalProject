<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="css_files/login.css">
</head>
<body>
        <?php
            include "assets/header.php";
        ?>
    <?php /* require "php_files/php_login.php"; */ ?>
    <form method="post" action="">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input type="text" placeholder="username" id="username" name="username">

        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">

        <input type="submit" value="Login" class="button" name="login">
    </form>
    
    <?php
        loginform();
    ?>
</body>
</html>