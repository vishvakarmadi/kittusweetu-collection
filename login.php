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
                        <form action="code/login.php" method="post">
                            <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="row">
                                <div class="col-md-6">
                                    <label>E-mail / Username</label>
                                    <input class="form-control" type="text" name="email" placeholder="E-mail....">
                                </div>
                                <div class="col-md-6">
                                    <label>Password</label>
                                    <input class="form-control" type="text" placeholder="Password.." name="password">
                                </div>
                                <div class="col-md-12">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="newaccount" name="check">
                                        <label class="custom-control-label" for="newaccount">Keep me signed in</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button class="btn">Submit</button>
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