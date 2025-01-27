<?php 

// echo "<pre>";
// print_r($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "hedder_link.php" ?>
</head>

<body>
    <!-- Top Header Start -->
    <?php include "heder.php" ?>
    <!-- Top Header End -->


    <!-- navbar Start -->
    <?php include "navbar.php" ?>

    <!-- navbar End -->

    <?php include "Breadcrumb.php" ?>

    <!-- main contant Start  -->

     <!-- Login Start -->
     <div class="login">
            <div class="container">
                <div class="section-header">
                    <h3>User Registration</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus
                    </p>
                </div>
                <div class="row"> 

                    <div class="col-md-12">
                    <h2 style="color: red;">
                                    <?php 
                                    if(isset($_GET["msg"])){
                                        echo $_GET["msg"];
                                    }
                                    ?>
                                </h2>    
                    <h2 style="color: green;">
                                    <?php 
                                    if(isset($_GET["msg1"])){
                                        echo $_GET["msg1"];
                                    }
                                    ?>
                                </h2>    
                        <div class="register-form">
                           
                        <form action="code/register.php" method="post">
                            <div class="row">
                                
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" name="first_name" type="text" placeholder="First Name">
                                    <p class="text-danger">
                                        <?php 
                                        if(isset($_SESSION["Error_first_name"])){
                                            echo $_SESSION["Error_first_name"];  
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input class="form-control" name="last_name" type="text" placeholder="Last Name">
                                    <p class="text-danger">
                                        <?php 
                                        if(isset($_SESSION["Error_last_name"])){
                                            echo $_SESSION["Error_last_name"];  
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" name="email" type="text" placeholder="E-mail">
                                    <p class="text-danger">
                                        <?php 
                                        if(isset($_SESSION["Error_email"])){
                                            echo $_SESSION["Error_email"];  
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control name" name="mo_no" type="text" placeholder="Mobile No">
                                    <p class="text-danger">
                                        <?php 
                                        if(isset($_SESSION["Error_mo_no"])){
                                            echo $_SESSION["Error_mo_no"];  
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" name="password" type="password" placeholder="Password">
                                    <p class="text-danger">
                                        <?php 
                                        if(isset($_SESSION["Error_password"])){
                                            echo $_SESSION["Error_password"];  
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label>confirm Password</label>
                                    <input class="form-control name" name="comferm_password" type="password" placeholder="Confirm Password">
                                    <p class="text-danger">
                                        <?php 
                                        if(isset($_SESSION["Error_comferm_password"])){
                                            echo $_SESSION["Error_comferm_password"];  
                                        }
                                        ?>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn">Submit</button>
                                </div>
                                
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Login End -->
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
<?php 
unset($_SESSION['Error_first_name']);
unset($_SESSION['Error_last_name']);
unset($_SESSION['Error_email']);
unset($_SESSION['Error_password']);
unset($_SESSION['Error_comferm_password']);
unset($_SESSION['Error_mo_no']);
?>