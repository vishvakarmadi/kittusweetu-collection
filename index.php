<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "hedder_link.php" ?>
</head>
<?php
$qurey = mysqli_query($con, "SELECT * FROM `slider` ORDER BY id DESC;");
$qurey1 = mysqli_query($con, "SELECT * FROM `category` ORDER BY id DESC limit 4;");
// print_r($_SESSION);
?>

<body>
    <!-- Top Header Start -->
    <?php include "heder.php" ?>
    <!-- Top Header End -->


    <!-- Header Start -->
    <?php include "navbar.php" ?>
    <!-- Header End -->


    <!-- Main Slider Start -->

    <div class="home-slider">
        <div class="main-slider">
            <?php
            while ($data = mysqli_fetch_array($qurey)) {
                // print_r( $data);
            ?>

                <div class="main-slider-item"><img src="admin/uplode/slider/<?= $data["image_name"] ?>" alt="Slider Image" /></div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- Main Slider End -->


    <!-- Feature Start-->
    <div class="feature">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-shield"></i>
                        <h2>Trusted Shopping</h2>
                        <p>
                            Seamless shopping, guaranteed trust
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-shopping-bag"></i>
                        <h2>Quality Product</h2>
                        <p>
                            Setting the standard for perfection
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-truck"></i>
                        <h2>Worldwide Delivery</h2>
                        <p>
                            From India to the world, on time, every time
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 feature-col">
                    <div class="feature-content">
                        <i class="fa fa-phone"></i>
                        <h2>Telephone Support</h2>
                        <p>
                            Round-the-clock support, whenever you need us
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Feature End-->


    <!-- Category Start-->

    <div class="category">
        <div class="container-fluid">
            <div class="row">
                <?php
                while ($category_data = mysqli_fetch_array($qurey1, MYSQLI_ASSOC)) {
                    // print_r($category_data);
                ?>
                    <div class="col-md-3">
                          <div class="category-img">
                            <img src="admin/uplode/category/<?= $category_data['image_name'] ?>" />
                            <a class="category-name" href="product-list.php?category_id=<?= $category_data['id'] ?>">
                                <h2><?= $category_data['category_name'] ?></h2>
                            </a>
                        </div>
                    </div>
                <?php } ?>


                <!--                     
                    <div class="col-md-4">
                        <div class="category-img">
                            <img src="img/category-3.jpg" />
                            <a class="category-name" href="">
                                <h2>Category Name</h2>
                            </a>
                        </div>
                        <div class="category-img">
                            <img src="img/category-4.jpg" />
                            <a class="category-name" href="">
                                <h2>Category Name</h2>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="category-img">
                            <img src="img/category-2.jpg" />
                            <a class="category-name" href="">
                                <h2>Category Name</h2>
                            </a>
                        </div>
                    </div> -->
            </div>
        </div>
    </div>
    <!-- Category End-->


    <!-- Featured Product Start -->
    <div class="featured-product">
        <div class="container">
            <div class="section-header">
                <h3>Featured Product</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus
                </p>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                <?php
                $prduct_query = mysqli_query($con, "SELECT * FROM `product` ORDER BY id DESC limit 4;");

                while ($product = mysqli_fetch_array($prduct_query, MYSQLI_ASSOC)) {
                    // print_r($product);
                ?>


                    <!-- fsadnjdfknbdfklbnfgnbklm -->
                    <div class="col-lg-3">
                        <div class="product-item">
                            <div class="product-image">
                                <a href="product-detail.php?id=<?= $product["id"] ?>">
                                    <img src="admin/uplode/product/<?= $product["product_img"] ?>" alt="Product Image">
                                </a>
                                <div class="product-action">
                                     <a href="code/add-card.php?id=<?=$product["id"]?>"><i class="fa fa-cart-plus"></i></a>
                                    <a href="#"><i class="fa fa-heart"></i></a>
                                    <a href="#"><i class="fa fa-search"></i></a>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="title"><a href="#"><?php echo $product["product_name"] ?></a></div>
                                <div class="ratting">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="price"><i class="bi bi-currency-rupee"></i><?php echo $product["selling_price"] ?> <span> <i class="bi bi-currency-rupee"></i><?php echo $product["mrp"] ?></span></div>
                            </div>
                        </div>
                    </div>
                    <!-- fsadnjdfknbdfklbnfgnbklm -->
                <?php } ?>


            </div>
        </div>
    </div>
    <!-- Featured Product End -->


    <!-- Newsletter Start -->
    <div class="newsletter">
        <div class="container">
            <div class="section-header">
                <h3>Subscribe Our Newsletter</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus
                </p>
            </div>
            <div class="form">
                <input type="email" value="Your email here">
                <button>Submit</button>
            </div>
        </div>
    </div>
    <!-- Newsletter End -->


    <!-- Recent Product Start -->
    <div class="recent-product">
        <div class="container">
            <div class="section-header">
                <h3>Recent Product</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus
                </p>
            </div>
            <div class="row align-items-center product-slider product-slider-4">
                <?php
                $prduct_query1 = mysqli_query($con, "SELECT * FROM `product` ORDER BY id  ASC;");

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
                                     <a href="code/add-card.php?id=<?=$product1["id"]?>"><i class="fa fa-cart-plus"></i></a>
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
                    <!--  -->
                <?php } ?>

            </div>
        </div>
    </div>
    <!-- Recent Product End -->


    <!-- Brand Start -->
    <div class="brand">
        <div class="container">
            <div class="section-header">
                <h3>Our Brands</h3>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus
                </p>
            </div>
            <div class="brand-slider">
                <?php
                $qurey3 = mysqli_query($con, "SELECT * FROM `brand` ORDER BY id DESC;");
                while ($brand = mysqli_fetch_array($qurey3, MYSQLI_ASSOC)) {
                    // print_r($brand); 
                ?>
                    <div class="brand-item"><img src="admin/uplode/brand/<?= $brand["image"] ?>" alt=""></div>
                <?php
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Brand End -->


    <!-- Footer Start -->
    <?php include "footer.php" ?>
    <!-- Footer Bottom End -->

    <?php include "footer_link.php" ?>
</body>

</html>