<?php
session_start();
$id=$_GET["id"];
include "check_login.php";
include "code/connection.php";
$category_sql = "SELECT * FROM `category` ORDER BY `id` DESC ";
$query1 = mysqli_query($con, $category_sql);
$sub_category_sql = "SELECT * FROM `sub_category` ORDER BY `id` DESC ";
$query2 = mysqli_query($con, $sub_category_sql);
$brand = "SELECT * FROM `brand` ORDER BY `id` DESC ";
$query3 = mysqli_query($con, $brand);
$sql="SELECT * FROM `product` Where id='$id'";
$query4=mysqli_query($con,$sql);
$data=mysqli_fetch_array($query4,MYSQLI_ASSOC);
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>adminEcom</title>
    <?php
    include "hedder_link.php";
    ?>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <?php include "spineer.php" ?>
        <!-- Spinner End -->
        <!-- Sidebar Start -->

        <?php include "sidebar.php"; ?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <?php include "navbar.php" ?>
            <!-- Navbar End -->
            <!-- new conttent add satrt  -->
            <!-- Add sub-catagry -->
            <!-- Add sub-catagry -->
            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-sm-8">
                        <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="#" class="">

                                    <h3 class="text-white"><i class="fa fa-user-edit me-2"></i>Edit Product</h3>
                                </a>
                            </div>
                            <h5 style="color: green;">
                                <?php
                                if (isset($_GET['msg'])) {
                                    echo $_GET['msg'];
                                }
                                // print_r($data);
                                ?>

                            </h5>
                            <form action="code/update-product.php" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                <!-- Product Name -->
                                <div class="form-group mb-3 mt-3">
                                    <label for="productName" class="mb-2">Product Name:</label>
                                    <input type="text" value="<?php echo $data["product_name"]?>" class="form-control for-c1" style="height: 50px; background:beige;" id="productName" name="ProductName" placeholder="Enter product name">
                                    <input type="hidden" value="<?php echo$data["id"]?>" class="form-control for-c1" style="height: 50px; background:beige;" id="id" name="id" placeholder="Enter product name">
                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["Error_ProductName"])) {
                                            echo $_SESSION["Error_ProductName"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Choose Category -->
                                <div class="form-group mb-3">
                                    <label for="category" class="mb-2">Choose Category:</label>
                                    <select class="form-control for-c1" id="category" name="category" style="height: 50px; background:beige;">
                                        <option selected disabled>Choose Category</option>
                                        <?php
                                        while ($data1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {

                                        ?>
                                            <option value="<?php echo $data1['id'] ?>"
                                            <?php 
                                            if($data['category_id']==$data1["id"]){
                                                echo "selected";
                                            }
                                            ?>
                                            ><?php echo $data1["category_name"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["Error_category"])) {
                                            echo $_SESSION["Error_category"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Choose Sub-Category -->
                                <div class="form-group mb-3">
                                    <label for="sub_catgory" class="mb-2">Choose Sub-Category:</label>
                                    <select class="form-control for-c1" id="sub_catgory" name="sub_catgory" style="height: 50px; background:beige;">
                                        <option selected disabled>Choose Sub-Category</option>
                                        <?php
                                        while ($data2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {

                                        ?>
                                            <option value="<?php echo $data2['id'] ?>"
                                            <?php 
                                            if($data['sub_category_id']==$data2["id"]){
                                                echo "selected";
                                            }
                                            ?>
                                            ><?php echo $data2["sub_name"] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <p style="color: red;">
                                        <?php

                                        if (isset($_SESSION["Error_sub_catgory"])) {
                                            echo $_SESSION["Error_sub_catgory"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Choose Brand -->
                                <div class="form-group mb-3">
                                    <label for="brand" class="mb-2">Choose Brand:</label>
                                    <select class="form-control for-c1" id="brand" name="brand" style="height: 50px; background:beige;">
                                        <option selected disabled>Choose Brand</option>
                                        <?php
                                        while ($data3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {

                                        ?>
                                            <option value="<?php echo $data3['id'] ?>" 
                                            <?php 
                                            if($data['brand_id']==$data3["id"]){
                                                echo "selected";
                                            }
                                            ?>
                                            ><?php echo $data3["name"] ?></option>
                                        <?php
                                        }
                                        ?>

                                    </select>
                                    <p style="color: red;">
                                        <?php

                                        if (isset($_SESSION["Error_brand"])) {
                                            echo $_SESSION["Error_brand"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Product Image -->
                                <div class="form-group mb-3">
                                    <label for="productImage" class="mb-2">Choose Image:</label>
                                    <input type="file" class=" bg-dark dropify" data-default-file="<?php echo "uplode/product/". $data["product_img"] ?>" style="color: black; " id="exampleInputPassword1" name="image">
                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["Error_img"])) {
                                            echo $_SESSION["Error_img"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Description -->
                                <div class="form-group mb-3">
                                    <label for="description" class="mb-2">Description:</label>
                                    <textarea class="form-control for-c1" id="description" name="Description" rows="4" style="background:beige;" placeholder="Enter product description">
                                        <?php echo $data["description"] ?>
                                    </textarea>
                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["Error_Description"])) {
                                            echo $_SESSION["Error_Description"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- MRP -->
                                <div class="form-group mb-3">
                                    <label for="mrp" class="mb-2">MRP:</label>
                                    <input type="number" class="form-control for-c1" value="<?=$data['mrp']?>" id="mrp" name="mrp"
                                        style="background:beige;" placeholder="Enter MRP" onkeyup="demo()">


                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["Error_mrp"])) {
                                            echo $_SESSION["Error_mrp"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Selling Price -->
                                <div class="form-group mb-3">
                                    <label for="sellingPrice" class="mb-2">Selling Price:</label>
                                    <input type="number" class="form-control for-c1" id="sellingPrice"value="<?= $data['selling_price']?>" name="Selling_Price" style="background:beige;" placeholder="Enter selling price" onkeyup="demo()">
                                    <p style="color: red;" id="sel">
                                        <?php
                                        if (isset($_SESSION["Error_mrp_pirce"])) {
                                            echo $_SESSION["Error_mrp_pirce"];
                                        }
                                        if (isset($_SESSION["Error_Selling_Price"])) {
                                            echo $_SESSION["Error_Selling_Price"];
                                        }
                                        ?>
                                    </p>


                                </div>
                                <!--  discoun -->
                                <div class="form-group mb-3">
                                    <label for="Discount" class="mb-2"> Discount:</label>
                                    <input type="text" class="form-control for-c1" id="Discount"  name="Discount" value="<?= $data['discount']?>" style="background:beige;" placeholder="Enter Discount price">
                                    <p style="color: red;" >
                                        <?php
                                        if (isset($_SESSION["Error_prsent"])) {
                                            echo $_SESSION["Error_prsent"];
                                        }
                                        if (isset($_SESSION["Error_Discount"])) {
                                            echo $_SESSION["Error_Discount"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Quantity -->
                                <div class="form-group mb-3">
                                    <label for="quantity" class="mb-2">Quantity:</label>
                                    <input type="number" value="<?=$data['quantity']?>"  class="form-control for-c1" id="quantity" name="quantity" style="background:beige;" placeholder="Enter quantity">
                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["Error_quantity"])) {
                                            echo $_SESSION["Error_quantity"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Choose Brand -->
                                <div class="form-group mb-3">
                                    <label for="status" class="mb-2">Status:</label>
                                    <select class="form-control for-c1" id="status" name="status" style="height: 50px; background:beige;">
                                        <option selected disabled>Choose Status</option>
                                        <option value="1"
                                        <?php
                                        if($data["status"]==1){
                                            echo "selected";
                                        }
                                        ?>
                                        >Active</option>
                                        <option value="2"
                                        <?php
                                        if($data["status"]=="2"){
                                            echo "selected";
                                        }
                                        ?>
                                        >Inctive</option>
                                    </select>
                                    <p style="color: red;">
                                        <?php

                                        if (isset($_SESSION["Error_status"])) {
                                            echo $_SESSION["Error_status"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Submit Button -->
                                <button type="submit" class="btn btn-white py-3 w-100 mb-4">Upadate</button>
                            </form>

                        </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- Add sub  -->
            <!-- Add sub  -->
        </div>
    </div>
    <!-- new conttent add  end -->

    <!-- Footer Start -->
    <?php include "footer.php" ?>
    <!-- Footer End -->

    <!-- Content End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-white btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include "jslink.php" ?>
    <script>
        function demo() {
            // alert("hello")
            var mrp = document.getElementById('mrp').value;
            var sellingPrice = document.getElementById('sellingPrice').value;
            res = (mrp - sellingPrice) * 100
            var Discount  = res / mrp;
            document.getElementById('Discount').value= Discount.toFixed(2);
            if (Number(sellingPrice)<=Number(mrp)){
                document.getElementById('sel').innerHTML=" ";
            }
            else{
                document.getElementById('sel').innerHTML="Plese enter selling price because Price is  Greter than Mrp  ";
            }

        }
    </script>
   
</body>

</html>
<?php
unset($_SESSION['Error_ProductName']);
unset($_SESSION['Error_category']);
unset($_SESSION['Error_sub_catgory']);
unset($_SESSION['Error_brand']);
unset($_SESSION['Error_Description']);
unset($_SESSION['Error_Selling_Price']);
unset($_SESSION['Error_mrp']);
unset($_SESSION['Error_quantity']);
unset($_SESSION['Error_img']);
unset($_SESSION['Error_status']);
unset($_SESSION['Error_mrp_pirce']);
unset($_SESSION['Error_prsent']);
unset($_SESSION['Error_Discount']);
?>