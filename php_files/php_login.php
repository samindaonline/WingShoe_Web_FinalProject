<?php

$loginstatus = "";

function loginform()
{

    if (isset($_POST['login'])) {
        require "connection.php";
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql_fetch = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = mysqli_query($con, $sql_fetch);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div id="login_result">' . "Username: " . $row['username'];
            $usertype = $row['usertype'];
        }

        if (mysqli_num_rows($result) > 0) {

            $_SESSION['user'] = $username;
            $_SESSION['usertype'] = $usertype;

            header('location:index.php');
        } else {
            echo '<div id="login_result" style="color:red;">' . "Incorrect username or password!" . '</div>';
        }
    }
}

function logged()
{


    if (!empty($_SESSION['user'])) {

        /* <a href="home.php?id=logout">Logout</a> */
        echo    '<div class="accicon"><img src="assets/icon/user.png" alt="user"></div>
                <div class="accname"><a href="index.php?id=logout">' . $_SESSION['user'] . '</a></div>';

        if (isset($_GET['id']) and $_GET['id'] == "logout") {
            $_SESSION['user'] = "";
            header("location:index.php");
        }
    } else {
        echo    '<div class="accicon"><img src="assets/icon/user.png" alt="user"></div>
            <div class="accname"><a href="login.php">Login/Register</a></div>';
    }
}

function cartcount()
{
    require 'connection.php';

    $numofrows = 0;
    if (!empty($_SESSION['user'])) {
        $username = $_SESSION['user'];

        $sql = "SELECT * FROM cart_items WHERE username='$username'";
        $result = mysqli_query($con, $sql);


        if ($result) {
            $numofrows = mysqli_num_rows($result);
        }
    }

    echo '<div class="wrapcart"><span id="cartcount" class="cartcount">' . $numofrows . '</span></div>
    <a href="cart.php"><img src="assets/icon/shoppingcart.png" alt="cart"></a>';
}
