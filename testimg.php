<!DOCTYPE html>
<html>

<head>
    <title>image upload</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="file" id="file">
        <input type="submit" value="submit" name="submit">
    </form>
    <?php
    include "php_files/connection.php";

    $productid = '00001';

    $sizeresult = mysqli_query($con, "SELECT * FROM stock WHERE product_id=$productid");
    //$sizes = mysqli_fetch_array($sizeresult);
    //print_r($sizes);
    //echo '<br>';
    //var_dump($sizes);
    $sumofshoes = 0;
    while ($sizes = mysqli_fetch_array($sizeresult)) {

        $qty = intval($sizes['stock_quantity']);
        $size = intval($sizes['size_id']);
        if ($qty >= 0) {
            $sumofshoes = $sumofshoes + $qty;
            echo 'Available ' . $size . ' ' . $qty . '<br>';
        }
    }
    if ($sumofshoes > 0) {
        echo 'instock ' . $sumofshoes;
    }
    ?>
</body>

</html>