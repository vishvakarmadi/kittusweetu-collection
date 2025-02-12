<?php
session_start();
include "check_login.php";
include "code/connection.php";

$id = $_GET["id"];
$sql = "SELECT * FROM `brand` WHERE `id`='$id'";
$qurey = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>brand</title>
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
            <!-- Add catagry -->
            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-sm-8">
                        <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                                <a href="#" class="">

                                    <h3 class="text-white"><i class="fa fa-user-edit me-2"></i>Edit Brand </h3>
                                </a>
                            </div>
                            <h5 style="color: green;">
                                <?php
                                if (isset($_GET['msg'])) {
                                    echo $_GET['msg'];
                                }
                                ?>

                            </h5>
                            <form action="code/brand-update.php" method="post" enctype="multipart/form-data">
                                <div class="form-group mb-3 mt-3">
                                    <?php
                                    $data = mysqli_fetch_array($qurey, MYSQLI_ASSOC);
                                    // print_r($data);
                                    ?>
                                    <label for="exampleInputEmail1" class="mb-2">Name:</label>
                                    <input type="text" class="form-control form-control-lg bg-dark" value="<?php echo $data["name"] ?>" style="height: 50px;" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" placeholder="Enter category name">
                                    <input type="hidden" class="form-control form-control-lg bg-dark" value="<?php echo $data["id"] ?>" style="height: 50px;" id="exampleInputEmail1" aria-describedby="emailHelp" name="id" placeholder="Enter category name">
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
                                    <input type="file" class=" dropify" data-default-file="<?php echo "uplode/brand/" . $data["image"] ?>" id="exampleInputPassword1" name="image">
                                </div>
                                <p style="color: red;">
                                    <?php
                                    if (isset($_SESSION["error_imag_name"])) {
                                        echo $_SESSION["error_imag_name"];
                                    }
                                    ?>
                                </p>

                                <button type="submit" class="btn btn-white py-3 w-100 mt-4">Update Brand</button>
                        </div>

                        </form>

                    </div>
                </div>
            </div>
            </form>
        </div>
        <!-- Sign In End -->
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

</body>

   

</html>
<?php
// print_r($_SESSION);
unset($_SESSION["error_name_brand"]);
?>