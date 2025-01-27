<?php
session_start();
include("code/connection.php");
include "check_login.php";

// Fetch categories from the database
$sql = "SELECT * FROM `category` ORDER BY `id` DESC";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>adminEcom</title>
    <?php include "hedder_link.php"; ?>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <?php include "spineer.php"; ?>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <?php include "sidebar.php"; ?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content bg-white">
            <!-- Navbar Start -->
            <?php include "navbar.php"; ?>
            <!-- Navbar End -->

            <!-- Add Sub-Category Start -->
            <div class="container-fluid bg-white">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-sm-8">
                        <div class="bg-dark rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="#">
                                    <h3 class="text-white"><i class="fa fa-user-edit me-2"></i>Add Sub-Category</h3>
                                </a>
                            </div>

                            <h5 style="color: green;">
                                <?php
                                if (isset($_GET['mag'])) {
                                    echo htmlspecialchars($_GET['mag'], ENT_QUOTES, 'UTF-8');
                                }
                                ?>
                            </h5>

                            <form action="code/add-sub-category.php" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                <div class="form-group mb-3 mt-3">
                                    <label for="exampleInputEmail1" class="mb-2">Sub-Category Name:</label>
                                    <input type="text" class="form-control for-c1 " style="height: 50px; background:beige;" id="c1s" aria-describedby="emailHelp" name="sub" placeholder="Enter sub-category name" >

                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["Error sub"])) {
                                            echo $_SESSION["Error sub"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group mb-3 mt-3">
                                    <label for="sub" class="mb-2">Category:</label>
                                    <select class="form-select form-select-lg mb-3" style="background-color: white;" id="sub" name="Category" aria-label=".form-select-lg example">
                                        <option selected disabled>Choose Category</option>
                                        <?php while ($data = mysqli_fetch_assoc($query)) { ?>
                                            <option value="<?php echo $data['id']; ?>">
                                                <?php echo $data['category_name']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["Error Category"])) {
                                            echo $_SESSION["Error Category"];
                                        }
                                        ?>
                                    </p>
                                </div>

                                <div class="form-group mb-3 mt-3">
                                    <label for="Status" class="mb-2">Status:</label>
                                    <select class="form-select form-select-lg mb-3" style="background-color: white;" id="Status" name="status" aria-label=".form-select-lg example">
                                        <option selected disabled>Choose Status</option>
                                        <option value="1">Active</option>
                                        <option value="2">Inactive</option>
                                    </select>
                                    <p style="color:red">
                                        <?php
                                        if (isset($_SESSION["Errorstatus"])) {
                                            echo $_SESSION["Errorstatus"];
                                        }
                                        ?>
                                    </p>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1" class="mb-2">Choose Image:</label>
                                    <input type="file" class="bg-dark dropify" style="color: black;" id="exampleInputPassword1" name="image">
                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["error_imag_name"])) {
                                            echo ($_SESSION["error_imag_name"]);
                                        }
                                        ?>
                                    </p>
                                </div>

                                <button type="submit" class="btn btn-white py-3 w-100 mb-4"> Add Sub-Category</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Add Sub-Category End -->

            <!-- Footer Start -->
            <?php include "footer.php"; ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-white btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include "jslink.php"; ?>
    
</body>

</html>
<?php 
unset($_SESSION["Error sub"]);
unset($_SESSION["Error Category"]);
unset($_SESSION["Errorstatus"]);
?>