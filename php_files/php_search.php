<?php

/*  */

if (isset($_POST['query'])) {
    include 'connection.php';
    $search = $_POST['query'];

    if (!empty($search)) {
        $sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
    } 

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
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
                    <div class="tshirt_img"><img src="' . $imgmain . '"></div>
                    <div class="btn_main">
                        <div class="buy_bt"><a href="#">Add Cart</a></div>
                        <div class="seemore_bt"><a href="productpage.php?productid=' . $productid . '">See More</a></div>
                    </div>
                </div>
            </div>
        </div>';
        }
    } else {
        echo '<div>No results found</div>';
    }
}
