<?php
session_start();
include "check_login.php";
include "code/connection.php";

$id = $_GET["id"];
$sql = "SELECT * FROM `slider` WHERE `id`='$id'";
$qurey = mysqli_query($con, $sql);
$data=mysqli_fetch_array($qurey,MYSQLI_ASSOC);


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
            <div class="container-fluid">
                <div class="row h-100 align-items-center justify-content-center" style="min-height: 100vh;">
                    <div class="col-sm-8">
                        <div class="bg-secondary rounded p-4 p-sm-5 my-4 mx-3">
                            <div class="d-flex align-items-center justify-content-between mb-3">
                   <a href="#" class="">

                                    <h3 class="text-white"><i class="fa fa-user-edit me-2"></i> Edit New Slider</h3>
                                </a>
                            </div>
                            <h5  style="color: green;">
                                <?php 
                                if(isset($_GET['msg'])){
                                echo $_GET['msg'] ;
                                }
                                ?>

                            </h5>
                            <form action="code/edit_slider.php" method="post" enctype="multipart/form-data" data-parsley-validate="">
                                
                                <div class="form-group mb-3">
                                    <label for="exampleInputPassword1" class="mb-2">Choose Slider Image:</label>
                                    <input type="hidden" value="<?=$data['id']?>" name="id">
                                    <input type="file" class=" bg-dark dropify" data-default-file="<?php echo "uplode/slider/" . $data["image_name"] ?>"  style="color: black; " id="exampleInputPassword1" name="image" >
                                    <p style="color: red;">
                                        <?php
                                        // print_r($data);
                                        if (isset($_SESSION["error_imag_name"])) {
                                            echo $_SESSION["error_imag_name"];
                                        }
                                        ?>
                                    </p>
                                </div>
                                <button type="submit" class="btn btn-white py-3 w-100 mb-4">Edit Slider</button>
                            </form>

                        </div>
                    </div>
                </div>
                </form>
            </div>
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

</body>

</html>
<?php 
unset($_SESSION['error_name']);
unset($_SESSION['error_imag_name']);
?>