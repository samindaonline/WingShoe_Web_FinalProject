<?php

function addshoes()
{
    require "connection.php";
    if (isset($_POST['save'])) {
        $productId = $_POST['product_id'];
        $product_name_entry = $_POST['name'];
        $productName = mysqli_real_escape_string($con, $product_name_entry);
        $entry = $_POST['description'];
        $description = mysqli_real_escape_string($con, $entry);
        $category = $_POST['category'];
        $price = $_POST['price'];
        $img1 = saveshoeimg($_FILES["photo1"], $productId, 1);
        $img2 = saveshoeimg($_FILES["photo2"], $productId, 2);

        /* echo $productId . '<br>' . $productName . '<br>' . $description; */

        /* echo $productId.'<br>'.$productName.'<br>'.$description.'<br>'.$category.'<br>'.$price; */
        /* include "connection.php"; */
        $sql_insert = "INSERT INTO products Values ('$productId','$productName','$description','$category','$price','$img1','$img2')";

        /* echo $productId.'<br>'. $productName.'<br>'.$color.'<br>'.$ram.'<br>'.$warranty.'<br>'.$price; */
        if ($result = mysqli_query($con, $sql_insert))
            echo '<script>alert("Data Inserted Successfully");</script>';
        else
            echo '<script>alert("Sorry, Data not added."' . mysqli_error($con) . ');</script>';
        /* echo 'Sorry, Data not added'.mysqli_error($con); */

        mysqli_close($con);
    }
}

function saveshoeimg($files, $productid, $imagenumber)
{
    $file = $files;

    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];

    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));

    $allowed = array('jpg', 'jpeg', 'png');

    if (in_array($fileActualExt, $allowed)) {
        $fileNameNew = $productid . "_" . $imagenumber . "." . $fileActualExt;
        $fileDestination = 'assets/images/shoes/' . $fileNameNew;
        move_uploaded_file($fileTmpName, $fileDestination);
        return $fileDestination;
    }
}

function shop()
{
    include "php_files/connection.php";
    $result = mysqli_query($con, "SELECT * FROM products");

    while ($data = mysqli_fetch_array($result)) {

        $productid = $data['product_id'];
        $productname = $data['name'];
        $imgmain = $data['photo2'];
        $price = $data['price'];

        echo '<div class="productrow">
        <div class="product-card">
            <div class="box_main">
                <h4 class="shirt_text">' . $productname . '</h4>
                <p class="price_text">Price <span style="color: #262626;">Rs.' . $price . '/-</span></p>
                <div class="product-img"><img src="' . $imgmain . '"></div>
                <div class="btn_main">
                    <div class="buy_bt"><a href="#">Add Cart</a></div>
                    <div class="seemore_bt"><a href="productpage.php?productid=' . $productid . '">See More</a></div>
                </div>
            </div>
        </div>
    </div>';
    }
}

function manageshoe()
{
    include "php_files/connection.php";
    $result = mysqli_query($con, "SELECT * FROM products");

    echo    '<table border=1>
                    <tr>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Delete</th>
                    </tr>';

    while ($data = mysqli_fetch_array($result)) {
        echo    '<tr>
                        <td>' . $data['product_id'] . '</td>
                        <td>' . $data['name'] . '</td>
                        <td><a href="mshoes.php?delete=' . $data['product_id'] . '">Delete</a> </td>
                    </tr>';
    }
    echo '</table>';

    if ((isset($_GET['delete']) == true) && (isset($_GET['delete']) <> null)) {
        $product_id = $_GET['delete'];
        $result = mysqli_query($con, "SELECT * FROM products WHERE product_id=$product_id");
        $data = mysqli_fetch_array($result);

        //echo $data;

        $img1path = $data['photo1'];
        $img2path = $data['photo2'];

        $filepath1 = $img1path;
        $filepath2 = $img2path;

        if (file_exists($filepath1) && file_exists($filepath2)) {
            unlink($filepath1);
            unlink($filepath2);
        }

        $sql_delete = "DELETE FROM products WHERE product_id='$product_id'";
        $result = mysqli_query($con, $sql_delete);

        if ($result) {
            header("location:mshoes.php");
            echo '<script>alert("A record is delelted successfully!");</script>';
        } else
            echo '<div id="book_search">Data is not Deleted!' . mysqli_error($con) . '</div>';
    }
}

function productview()
{
    if ((isset($_GET['productid']) == true) && (isset($_GET['productid']) <> null)) {
        $productid = $_GET['productid'];
        include "php_files/connection.php";

        $result = mysqli_query($con, "SELECT * FROM products WHERE product_id=$productid");
        $data = mysqli_fetch_assoc($result);

        $productid = $data['product_id'];
        $productname = $data['name'];
        $price = $data['price'];
        $description = $data['description'];
        $imgsecond = $data['photo1'];
        $imgmain = $data['photo2'];

        $sizeresult = mysqli_query($con, "SELECT * FROM stock WHERE product_id=$productid");

        $sumofshoes = 0;
        $sizesitem = '';
        while ($sizes = mysqli_fetch_array($sizeresult)) {

            $qty = intval($sizes['stock_quantity']);
            $size = intval($sizes['size_id']);

            if ($qty >= 0) {
                $sumofshoes = $sumofshoes + $qty;
                /* $qryparam = array('productid' => $productid, 'size' => $size);
                $quaryString = http_build_query($qryparam); */
                $sizesitem .= '<li><a href="" class="sizeitem" id="' . $size . '">' . $size . '</a></li>';
            }
        }
        if ($sumofshoes > 0) {
            $stocklabel = '<label class="label-stock bg-success">In Stock</label>';
        } else {
            $stocklabel = '<label class="label-stock bg-danger">Out of Stock</label>';
        }

        echo '<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="carousel-container">
                        <div class="carousel-slide">
                            <img src="' . $imgmain . '" alt="Image 1">
                            <img src="' . $imgsecond . '" alt="Image 2">
                        </div>
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                        ' . $productname . '
                            ' . $stocklabel . '
                        </h4>

                        <div>
                            <span class="selling-price">Rs. ' . $price . '</span>
                            <span class="original-price">Rs. ' . $price = $price + ($price * 0.10) . '.00</span>
                        </div>
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" id="prev"><i class="fa fa-minus"></i></span>
                                <input type="text" value="1" class="input-quantity" id="qty" />
                                <span class="btn btn1" id="next"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <div class="size-wrap">
                            <div class="block-26 mb-2">
                                <h4>Available Sizes</h4>
                                <ul>
                                    ' . $sizesitem . '
                                </ul>
                            </div>
                            <div class="mt-2">
                                <a href="" class="btn btn-primary" id="addtocart" data-product-id="' . $productid . '"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            </div>
                            <div class="mt-3">
                                <h5 class="mb-0">Small Description</h5>
                                <p>
                                ' . $description . '
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
}

function featuredproduct()
{
    include "php_files/connection.php";
    $count = 0;
    while ($count < 3) {

        $random_number = mt_rand(00000, 00030);

        $random_number = sprintf('%05d', $random_number);

        $result = mysqli_query($con, "SELECT * FROM products WHERE product_id=$random_number");

        $data = mysqli_fetch_assoc($result);

        $productid = $data['product_id'];
        $productname = $data['name'];
        $category = $data['category'];
        $imgmain = $data['photo2'];
        $price = $data['price'];
        $oldprice = floatval($data['price']) + (floatval($data['price']) * 0.1);

        echo '<div class="fcard">
                    <div class="badge">Hot</div>
                    <div class="product-tumb">
                        <img src="' . $imgmain . '" alt="">
                    </div>
                    <div class="product-details">
                        <span class="product-catagory">' . $category . '</span>
                        <h4><a href="productpage.php?productid=' . $productid . '">' . $productname . '</a></h4>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p> -->
                        <div class="product-bottom-details">
                            <div class="product-price"><small>Rs. ' . $oldprice . '.00</small>Rs.' . $price . '</div>
                        </div>
                    </div>
                </div>';

        $count = $count + 1;
    }
}

function cart()
{
    if (!empty($_SESSION['user'])) {
        include 'connection.php';
        $username = $_SESSION['user'];
        $result = mysqli_query($con, "SELECT c.transactionId,c.product_id, p.name,p.category, p.price, c.quantity, c.size_id, p.photo2 from cart_items c,products p Where c.product_id=p.product_id AND c.username='$username'");

        while ($data = mysqli_fetch_array($result)) {

            $productid = $data['product_id'];
            $transid = $data['transactionId'];
            $productname = $data['name'];
            $category = $data['category'];
            $price = $data['price'];
            $quantity = $data['quantity'];
            $size = $data['size_id'];
            $imgmain = $data['photo2'];

            echo '<tr>
                    <th scope="row" class="border-0">
                        <div class="p-2">
                            <img src="' . $imgmain . '" alt="" width="70" class="img-fluid rounded shadow-sm">
                            <div class="ml-3 d-inline-block align-middle">
                                <h5 class="mb-0"> <a href="productpage.php?productid=' . $productid . '" class="text-dark d-inline-block align-middle">' . $productname . '</a></h5><span class="text-muted font-weight-normal font-italic d-block">Category: ' . $category . ' | Size: ' . $size . '</span>
                            </div>
                        </div>
                    </th>
                    <td class="border-0 align-middle"><strong>' . $price . '</strong></td>
                    <td class="border-0 align-middle"><strong>' . $quantity . '</strong></td>
                    <td class="border-0 align-middle"><a href="#" id="removeitem" data-transid="' . $transid . '" class="text-dark"><i class="fa fa-trash"></i></a></td>
                </tr>';
        }
    }
}
