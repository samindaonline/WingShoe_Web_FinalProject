<?php
session_start();
if (isset($_POST['productId'])) {
    include 'connection.php';
    $productId = $_POST['productId'];
    $username = $_SESSION['user'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];

    if (!empty($username)) {
        $sql = "INSERT INTO cart_items (username, product_id, size_id, quantity) VALUES ('$username', '$productId', '$size', '$quantity')";
        if (mysqli_query($con, $sql)) {
            echo 'success';
        } else {
            echo 'error';
        }
    } else
        echo 'error';
}
