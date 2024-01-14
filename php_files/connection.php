<?php
    $con=mysqli_connect("localhost","library_user","123","wingshoe");
    
    if(!$con){
        die("Connected Failed".mysqli_connect_error());
    }
?>