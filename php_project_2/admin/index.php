<?php
session_start();
// print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>adminlogin</title>
    <?php
    include "hedder_link.php";
    ?>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0 bg-white">
        
        <!-- Spinner End -->


        <!-- Sign In Start -->
        <div class="container-fluid">
            <div class="row h-100 align-items-center justify-content-center " style="min-height: 100vh;">
                <div class="col-12 col-sm-8 col-md-6 col-lg-5 col-xl-4  ">
                    <div class="bg-dark rounded p-4 p-sm-5 my-4 mx-3">
                        <div class="d-flex align-items-center justify-content-between mb-3 ">

                            <a href="index.html" class="">
                                <h3 class="text-white"><i class="fa fa-user-edit me-2"></i>Admin</h3>
                            </a>
                            <form action="code/login.php" method="post" enctype="multipart/form-data">
                                <h3></h3>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control " style="background-color: white;" id="floatingInput" name="email" placeholder="name@example.com">
                            <label for="floatingInput" class="text-dark">Email address</label>
                            <p style="color: red;">
                                <?php
                                if(isset($_SESSION["error email"])){
                                    echo $_SESSION["error email"];
                                }
                                ?>
                            </p>
                        </div>
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control"  style="background-color: white;" name="password" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword" class="text-dark">Password</label>
                            <p style="color: red;">
                                <?php
                                if(isset($_SESSION["error password"])){
                                    echo $_SESSION["error password"];
                                }
                                ?>
                            </p>
                        </div>
                        <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input bg-dark text-dark " style="border: 2px solid white;" value="check" name="check" id="exampleCheck1">
                                <label class="form-check-label text-white" style="accent-color:black;" for="exampleCheck1" >Check me out</label>
                                <p style="color: red;">
                                <?php
                                if(isset($_SESSION["check_error"])){
                                    echo $_SESSION["check_error"];
                                }
                                ?>
                            </p>
                            </div>
                        <button type="submit" class="btn bg-white  py-3 w-100 mb-4">Login</button>
                        </from>
                    </div>
                </div>
            </div>
        </div>
        <!-- Sign In End -->
    </div>

    <!-- JavaScript Libraries -->
    <?php include "jslink.php" ?>


</body>

</html>
<?php 
unset($_SESSION["error email"],$_SESSION["error password"],$_SESSION["check_error"]);
?>