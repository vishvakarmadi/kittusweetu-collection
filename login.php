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

    <!-- main content Start  -->

    <!-- Login Start -->
    <div class="login">
        <div class="container">

            <div class="section-header">

                <h3>User Login</h3>
                <p>
                    Welcome back! Please log in to your account to access all features.
                </p>

            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="login-form">
                        <form action="code/login.php" method="post">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-danger">
                                                <?php
                                                if (isset($_GET["msg"])) {
                                                    echo $_GET["msg"];
                                                }
                                                ?>
                                            </h5>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="email">E-mail / Username</label>
                                            <input class="form-control" type="text" id="email" name="email" placeholder="Enter your email or username">
                                            <p class="text-danger">
                                                <?php
                                                // print_r($_SESSION);
                                                if (isset($_SESSION['Error_email'])) {
                                                    echo $_SESSION['Error_email'];
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" id="password" name="password" placeholder="Enter your password">
                                            <p class="text-danger">
                                                <?php
                                                // print_r($_SESSION);
                                                if (isset($_SESSION['Error_password'])) {
                                                    echo $_SESSION['Error_password'];
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="newaccount" name="check">
                                                <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                                <p class="text-danger">
                                                    <?php
                                                    // print_r($_SESSION);
                                                    if (isset($_SESSION['Error_check'])) {
                                                        echo $_SESSION['Error_check'];
                                                    }
                                                    ?>
                                                </p>
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            

                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-dark">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login End -->
    <!-- main content End  -->

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
unset($_SESSION['Error_check']);

unset($_SESSION['Error_query']);
unset($_SESSION['Error_password']);
unset($_SESSION['Error_email']);

?>