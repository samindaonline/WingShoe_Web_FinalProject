<!DOCTYPE html>
<html>

<head>
    <title>Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet" type='text/css'>

    <link rel="stylesheet" href="css_files/product.css">

</head>

<body>
    <?php
    include "assets/header.php";
    ?>
    <div class="maincontent">
        <div class="py-3 py-md-5 bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mt-3">
                        <!-- <div class="bg-white border">
                            <img src="assets/images/noimg.jpg" class="w-100" alt="Img">
                        </div> -->
                        <div class="carousel-container">
                            <div class="carousel-slide">
                                <img src="assets/images/noimg.jpg" alt="Image 1">
                                <img src="assets/images/noimg.jpg" alt="Image 2">
                                <img src="assets/images/noimg.jpg" alt="Image 3">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7 mt-3">
                        <div class="product-view">
                            <h4 class="product-name">
                                HP Laptop 15IQasd54
                                <label class="label-stock bg-success">In Stock</label>
                            </h4>

                            <div>
                                <span class="selling-price">$399</span>
                                <span class="original-price">$499</span>
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
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">6</a></li>
                                        <li><a href="#">7</a></li>
                                        <li><a href="#">8</a></li>
                                        <li><a href="#">9</a></li>
                                        <li><a href="#">10</a></li>
                                    </ul>
                                </div>
                                <div class="mt-2">
                                    <a href="" class="btn btn-primary"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                                </div>
                                <div class="mt-3">
                                    <h5 class="mb-0">Small Description</h5>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a ty
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js_files/productpage.js"></script>

</body>

</html>