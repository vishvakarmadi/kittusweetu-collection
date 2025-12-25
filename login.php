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
                    <h3>User Login</h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec viverra at massa sit amet ultricies. Nullam consequat, mauris non interdum cursus
                    </p>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="login-form">
                            <?php
                            if (isset($_GET['msg']) && $_GET['msg'] == 'logout') {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>You have been successfully logged out.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            if (isset($_GET['error']) && $_GET['error'] == 'invalid') {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>Invalid email or password.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            if (isset($_GET['error']) && $_GET['error'] == 'notfound') {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i>Account not found. Please register first.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            ?>
                            <form action="code/login.php" method="post">
                                <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label>E-mail</label>
                                        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label>Password</label>
                                        <input class="form-control form-control-lg" type="password" placeholder="Enter your password" name="password" required>
                                        <div class="mt-1">
                                            <a href="forgot-password.php" class="text-primary small">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input" id="rememberMe" name="check">
                                            <label class="form-check-label" for="rememberMe">Keep me signed in</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Sign In</button>
                                    </div>
                                    <div class="col-md-12 text-center mt-3">
                                        <p>Don't have an account? <a href="Resitaion.php" class="text-primary">Register Now</a></p>
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