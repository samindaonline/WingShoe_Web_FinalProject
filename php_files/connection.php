<?php
$con = mysqli_connect("localhost", "library_user", "123", "wingshoe");
/* $con = mysqli_connect("localhost", "id21691066_saminda", "@Saminda21", "id21691066_saminda"); */


if (!$con) {
    die("Connected Failed" . mysqli_connect_error());
}
