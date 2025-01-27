<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "hedder_link.php" ?>
</head>
<!-- Top Header Start -->
<?php include "heder.php" ?>
<!-- Top Header End -->
<!-- navbar Start -->
<?php include "navbar.php" ?>
<!-- navbar End -->
<?php include "Breadcrumb.php" ?>

<!-- main contant Start  -->
<!-- Product List Start -->
<div class="product-view">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="product-search">
                                    <input type="email" value="Search">
                                    <button><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="product-short">
                                    <div class="dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Product short
                                            by</a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a href="product-list.php?price=low" class="dropdown-item">Price(Low to High)</a>
                                            <a href="product-list.php?price=high" class="dropdown-item">Price(High to Low)</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product Start -->

                    <?php
                    
                    if(isset($_GET["category_id"]) && !empty($_GET["category_id"])){
                        $categoty_id=$_GET["category_id"];
                        $sql="SELECT * FROM `product` where category_id=$categoty_id ORDER BY id  ASC";
                      }
                      elseif(isset($_GET['brand_id']) && !empty($_GET['brand_id'])){
                        $brandid=$_GET['brand_id'];
                        $sql="SELECT * FROM `product` where brand_id=$brandid ORDER BY id  ASC";
                    }
                     
                    elseif(isset($_GET["price"])){
                        if($_GET["price"]=="low"){
                            $sql="SELECT * FROM `product` ORDER BY selling_price ASC";
                        }
                        if($_GET["price"]=="high"){
                            $sql="SELECT * FROM `product` ORDER BY selling_price DESC";
                        }
                    }
                    
                    elseif(isset($_GET["category_id"]) && !empty($_GET["category_id"])){
                      $categoty_id=$_GET["category_id"];
                      $sql="SELECT * FROM `product` where category_id=$categoty_id ORDER BY id  ASC";
                    }
                    else{
                        $sql="SELECT * FROM `product` ORDER BY id  ASC";
                    }
                    $prduct_query1 = mysqli_query($con, $sql);

                    while ($product1 = mysqli_fetch_array($prduct_query1, MYSQLI_ASSOC)) {
                        // print_r($product);
                    ?>
                        <!-- Recent Product -->
                        <div class="col-lg-4">
                            <div class="product-item">
                                <div class="product-image">
                                    <a href="product-detail.php?id=<?= $product1["id"] ?>">
                                        <img src="admin/uplode/product/<?= $product1["product_img"] ?>" alt="Product Image">
                                    </a>
                                    <div class="product-action">
                                    <a href="code/add-card.php?id=<?=$product1['id']?>"><i class="fa fa-cart-plus"></i></a>
                               
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="title"><a href="product-detail.php?id=<?= $product1["id"] ?>"><?php echo $product1["product_name"] ?></a></div>
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
                    <!-- product Start -->


                </div>

                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">Previous</a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">Next</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>



          
        </div>
    </div>
</div>
<!-- Product List End -->

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