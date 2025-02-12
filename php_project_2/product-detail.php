<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "hedder_link.php" ?>
</head>
<?php
if(isset($_GET["id"]) && !empty($_GET["id"])){
    $id = $_GET["id"];
}
else{
    header("location:product-list.php");
}
$query = mysqli_query($con, "SELECT * FROM `product` WHERE `id`=$id");
$data = mysqli_fetch_array($query, MYSQLI_ASSOC);
// print_r($data);
?>

<body>
    <!-- Top Header Start -->
    <?php include "heder.php" ?>
    <!-- Top Header End -->


    <!-- navbar Start -->
    <?php include "navbar.php" ?>
    <!-- navbar End -->


    <!-- main contant Start  -->

    <!-- Breadcrumb Start -->
    <?php include "Breadcrumb.php" ?>

    <!-- Breadcrumb End -->


    <!-- Product Detail Start -->
    <div class="product-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-9">
                    <div class="row align-items-center product-detail-top">
                        <div class="col-md-5">
                            <div class="product-slider-single">
                                <img src="admin/uplode/product/<?php echo $data["product_img"] ?>" alt="Product Image">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-content">
                                <div class="title">
                                    <h2><?= $data["product_name"] ?></h2>
                                </div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price"><i class="bi bi-currency-rupee"></i><?= $data["selling_price"] ?><span><i class="bi bi-currency-rupee"></i><?= $data["mrp"] ?></span></div>
                                <div class="details">
                                    <p>
                                        <?= $data["description"] ?>
                                    </p>
                                </div>

                                <div class="quantity">
                                    <h4>Quantity:</h4>
                                    <div class="qty">
                                        <button class="btn-minus"><i class="fa fa-minus"></i></button>
                                        <input type="text" value="1">
                                        <button class="btn-plus"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <div class="action">
                                    <a href="#"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>





                        </div>
                    </div>

                    <div class="row product-detail-bottom">
                        <div class="col-lg-12">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#description">Description</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#reviews">Reviews (1)</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="description" class="container tab-pane active"><br>
                                    <h4>Product description</h4>
                                    <p>
                                        <?= $data["description"] ?>
                                    </p>
                                </div>
                                <div id="reviews" class="container tab-pane fade"><br>
                                    <div class="reviews-submitted">
                                        <div class="reviewer"><?= $data["product_name"] ?> <span>01 Jan 2020</span></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <p>
                                            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.
                                        </p>
                                    </div>
                                    <div class="reviews-submit">
                                        <h4>Give your Review:</h4>
                                        <div class="ratting">
                                            <i class="fa fa-star-o" id="review1" onclick="review()" data-value="1"></i>
                                            <i class="fa fa-star-o"  id="review1" onclick="review()" data-value="2"></i>
                                            <i class="fa fa-star-o"  id="review1" onclick="review()" data-value="3"></i>
                                            <i class="fa fa-star-o"  id="review1" onclick="review()" data-value="4"></i>
                                            <i class="fa fa-star-o"  id="review1" onclick="review()" data-value="5"></i>
                                        </div>
                                        <form action="code/review.php" method="post">
                                        <div class="row form">
                                            <div class="col-sm-6">
                                                <input type="text" placeholder="Name" name="name">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" placeholder="Email" name="email">
                                            </div>
                                            <div class="col-sm-12">
                                                <textarea placeholder="Review" name="review"></textarea>
                                            </div>
                                            <div class="col-sm-12">
                                                <button>Submit</button>
                                            </div>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container">
                        <div class="section-header">
                            <h3>Related Products</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus
                            </p>
                        </div>
                    </div>

                    <div class="row align-items-center product-slider product-slider-3">


                        <!-- Related Products Start -->
                        <?php
                        $categoty_id = $data["category_id"];
                        $prduct_query1 = mysqli_query($con, "SELECT * FROM `product` where category_id ='$categoty_id' and id!=$id ORDER BY id  ASC;");

                        while ($product1 = mysqli_fetch_array($prduct_query1, MYSQLI_ASSOC)) {
                            // print_r($product);
                        ?>
                            <!-- Recent Product -->
                            <div class="col-lg-3">
                                <div class="product-item">
                                    <div class="product-image">
                                        <a href="product-detail.php?id=<?= $product1["id"] ?>">
                                            <img src="admin/uplode/product/<?= $product1["product_img"] ?>" alt="Product Image">
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-heart"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-content">
                                        <div class="title"><a href="#"><?php echo $product1["product_name"] ?></a></div>
                                        <div class="ratting">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="price"><i class="bi bi-currency-rupee"></i><?php echo $product1["selling_price"] ?> <span> <i class="bi bi-currency-rupee"></i><?php echo $product1["mrp"] ?></span></div>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>

                        <!-- Related Products end -->

                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="sidebar-widget category">
                        <h2 class="title">Category</h2>
                        <ul>
                            <?php 
                            $caregory_query=mysqli_query($con,"SELECT * FROM `category` ORDER BY id DESC");
                            while($categoty=mysqli_fetch_array($caregory_query,MYSQLI_ASSOC)){
                            // print_r($categoty);
                            ?>
                            <li><a href="product-list.php?category_id=<?php echo $categoty["id"] ?>"><?php echo $categoty["category_name"] ?></a><span>(83)</span></li>
                            <?php 
                            }
                            ?>
                           
                        </ul>
                    </div>

                    <div class="sidebar-widget image">
                        <h2 class="title">Featured Product</h2>
                        <a href="#">
                            <img src="img/category-1.jpg" alt="Image">
                        </a>
                    </div>

                    <div class="sidebar-widget brands">
                        <h2 class="title">Our Brands</h2>
                        <ul>
                            <li><a href="#">Nulla </a><span>(45)</span></li>
                            <li><a href="#">Curabitur </a><span>(34)</span></li>
                            <li><a href="#">Nunc </a><span>(67)</span></li>
                            <li><a href="#">Ullamcorper</a><span>(74)</span></li>
                            <li><a href="#">Fusce </a><span>(89)</span></li>
                            <li><a href="#">Sagittis</a><span>(28)</span></li>
                        </ul>
                    </div>

                    <div class="sidebar-widget tag">
                        <h2 class="title">Tags Cloud</h2>
                        <a href="#">Lorem ipsum</a>
                        <a href="#">Vivamus</a>
                        <a href="#">Phasellus</a>
                        <a href="#">pulvinar</a>
                        <a href="#">Curabitur</a>
                        <a href="#">Fusce</a>
                        <a href="#">Sem quis</a>
                        <a href="#">Mollis metus</a>
                        <a href="#">Sit amet</a>
                        <a href="#">Vel posuere</a>
                        <a href="#">orci luctus</a>
                        <a href="#">Nam lorem</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Detail End -->
    <!-- main contant End  -->

    <!-- Footer Start -->
    <?php include "footer.php" ?>
    <!-- Footer Bottom End -->


    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include "footer_link.php" ?>
</body>

</html>