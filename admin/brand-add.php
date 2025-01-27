<?php
session_start();
include "check_login.php";
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
            <!-- brand -satart -->
            <div class="container-fluid bg-white">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-sm-8">
                        <div class="bg-dark rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="#" class="">

                                    <h3 class="text-white"><i class="fa fa-user-edit me-2"></i>Add New Brand</h3>
                                </a>
                            </div>
                            <h5 style="color: green;">
                                <?php
                                if (isset($_GET['msg'])) {
                                    echo $_GET['msg'];
                                }
                                ?>

                            </h5>
                            <form action="code/add-brand.php" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                <div class="form-group mb-3 mt-3">
                                    <label for="exampleInputEmail1" class="mb-2">Name:</label>
                                    <input type="text" class="form-control for-c1 " style="height: 50px; background:beige;" id="c1s" aria-describedby="emailHelp" name="name" placeholder="Enter Brand name">
                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["error_name_brand"])) {
                                            echo $_SESSION["error_name_brand"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1" class="mb-2">Choose Image:</label>
                                    <input type="file" class=" bg-dark dropify" style="color: black; " id="exampleInputPassword1" name="image">
                                    <p style="color: red;">
                                        <?php
                                        if (isset($_SESSION["error_imag_name"])) {
                                            echo $_SESSION["error_imag_name"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-white py-3 w-100 mb-4"> Add Brand </button>
                            </form>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            <!-- brand -->
            <!-- new conttent add  end -->

            <!-- Footer Start -->
            <?php include "footer.php" ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-white btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include "jslink.php" ?>
</body>

</html>
<?php 
// print_r($_SESSION);
unset($_SESSION['error_imag_name']);
unset($_SESSION['error_name_brand']);
?>