<?php 
session_start();
include "check_login.php";
// print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>adminEcom</title>
   <?php 
   include "hedder_link.php";
   ?>
</head>

<body class="bg-white">
    <div class="container-fluid position-relative d-flex p-0 bg-white">
       
        <!-- Spinner End -->
        <!-- Sidebar Start -->
        
        <?php include "sidebar.php";?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content bg-white" >
            <!-- Navbar Start -->
            <?php include "navbar.php"?>
            <!-- Navbar End -->
                 <!-- content start -->
                 <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-sm-8">
                        <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="#" class="">

                                    <h3 class="text-white"><i class="fa fa-user-edit me-2"></i>Add New Product</h3>
                                </a>
                            </div>
                            <h5 style="color: green;">
                                <?php
                                if (isset($_GET['msg'])) {
                                    echo $_GET['msg'];
                                }
                                ?>

                            </h5>
                            <form action="code/add-product.php" method="post" enctype="multipart/form-data"
                                data-parsley-validate="">
                                <!-- Product Name -->
                                <div class="form-group mb-3 mt-3">
                                    <label for="productName" class="mb-2">Product Name:</label>
                                    <input type="text" class="form-control for-c1"
                                        style="height: 50px; background:beige;" id="productName" name="ProductName"
                                        placeholder="Enter product name">
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
                                    <select class="form-control for-c1" id="category" name="category"
                                        style="height: 50px; background:beige;">
                                        <option selected disabled>Choose Category</option>
                                        <?php
                                        while ($data1 = mysqli_fetch_array($query1, MYSQLI_ASSOC)) {

                                            ?>
                                            <option value="<?php echo $data1['id'] ?>"><?php echo $data1["category_name"] ?>
                                            </option>
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
                                    <select class="form-control for-c1" id="sub_catgory" name="sub_catgory"
                                        style="height: 50px; background:beige;">
                                        <option selected disabled>Choose Sub-Category</option>
                                        <?php
                                        while ($data2 = mysqli_fetch_array($query2, MYSQLI_ASSOC)) {

                                            ?>
                                            <option value="<?php echo $data2['id'] ?>"><?php echo $data2["sub_name"] ?>
                                            </option>
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
                                    <select class="form-control for-c1" id="brand" name="brand"
                                        style="height: 50px; background:beige;">
                                        <option selected disabled>Choose Brand</option>
                                        <?php
                                        while ($data3 = mysqli_fetch_array($query3, MYSQLI_ASSOC)) {

                                            ?>
                                            <option value="<?php echo $data3['id'] ?>"><?php echo $data3["name"] ?></option>
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
                                    <input type="file" class=" bg-dark dropify" style="color: black; "
                                        id="exampleInputPassword1" name="image">
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
                                    <textarea class="form-control for-c1" id="description" name="Description" rows="4"
                                        style="background:beige;" placeholder="Enter product description"></textarea>
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
                                    <input type="number" class="form-control for-c1" id="mrp" name="mrp"
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
                                    <input type="number" class="form-control for-c1" id="sellingPrice"
                                        name="Selling_Price" style="background:beige;" placeholder="Enter selling price"
                                        onkeyup="demo()">
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
                                <!-- Selling Price -->
                                <div class="form-group mb-3">
                                    <label for="Discount" class="mb-2"> Discount:</label>
                                    <input type="text" class="form-control for-c1" id="Discount" name="Discount" style="background:beige;" placeholder="Enter Discount price">
                                    <p style="color: red;" >
                                        <?php
                                        if (isset($_SESSION["Error_Discount"])) {
                                            echo $_SESSION["Error_Discount"];
                                        }
                                        if (isset($_SESSION["Error_prsent"])) {
                                            echo $_SESSION["Error_prsent"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <!-- Quantity -->
                                <div class="form-group mb-3">
                                    <label for="quantity" class="mb-2">Quantity:</label>
                                    <input type="number" class="form-control for-c1" id="quantity" name="quantity"
                                        style="background:beige;" placeholder="Enter quantity">
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
                                    <select class="form-control for-c1" id="status" name="status"
                                        style="height: 50px; background:beige;">
                                        <option selected disabled>Choose Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inctive</option>
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
                                <button type="submit" class="btn btn-white py-3 w-100 mb-4">Add Product</button>
                            </form>

                        </div>
                    </div>
                </div>
                </form>
            </div>
                 <!-- content end -->

            <?php //include "footer.php" ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-dark text-white btn-lg-square back-to-top "><i class="bi bi-arrow-up"></i></a>
    </div>

  <?php include "jslink.php"?>  
</body>

</html>
<?php 
?>
