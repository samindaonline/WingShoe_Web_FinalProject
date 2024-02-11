<?php

if (isset($_POST['transId'])) {
    include 'connection.php';
    $transId = $_POST['transId'];

    if (!empty($transId)) {
        $sql = "Delete FROM cart_items WHERE transactionId = '$transId'";
    }

    if (mysqli_query($con, $sql)) {
        include 'php_shop.php';
        echo cart();
    } else {
        echo 'error';
    }
}
