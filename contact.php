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

    <!-- Contact Start -->

    <div class="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7">
                    
                    <div class="form">
                    <h4 style="color: green;">
                        <?php
                        if (isset($_GET["msg"])) {
                            echo $_GET["msg"];
                        }
                        ?>
                    </h4>
                        <form action="code/contact-us.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="text" class="form-control" name="name" placeholder="Your Name" />
                                    <p class="text-danger"><?php
                                   
                                    if(isset($_SESSION["Error_name"])){
                                        echo $_SESSION['Error_name'];
                                    }
                                    ?></p>
                                </div>
                                <div class="form-group col-md-6">
                                    <input type="email" class="form-control" name="email" placeholder="Your Email" />
                                    <p class="text-danger">
                                        <?php 
                                        if(isset($_SESSION["Error_email"])){
                                            echo $_SESSION['Error_email'];
                                        }
                                        ?>
                                    </p>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Subject" name="subject" />
                                <p class="text-danger">
                                        <?php 
                                        if(isset($_SESSION["Error_subject"])){
                                            echo $_SESSION['Error_subject'];
                                        }
                                        ?>
                                    </p>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" rows="5" name="massage" placeholder="Message"></textarea>
                                <p class="text-danger">
                                        <?php 
                                        if(isset($_SESSION["Error_massage"])){
                                            echo $_SESSION['Error_massage   '];
                                        }
                                        ?>
                                    </p>
                            </div>
                            <div><button type="submit">Send Message</button></div>
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="contact-info">
                        <div class="section-header">
                            <h3>Get in Touch</h3>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus.
                            </p>
                        </div>
                        <h4><i class="fa fa-map-marker"></i>123 E Shop, Los Angeles, CA, USA</h4>
                        <h4><i class="fa fa-envelope"></i>davis2316672@gmail.com</h4>
                        <h4><i class="fa fa-phone"></i>+91 9517485106</h4>
                        <div class="social">
                            <a href=""><i class="fa fa-twitter fa-beat"></i></a>
                            <a href=""><i class="fa fa-facebook fa-beat"></i></a>
                            <a href="https://www.linkedin.com/in/aditya-vishvakarma-97a57a2b7?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" target="_blanck"><i class="fa fa-linkedin fa-beat"></i></a>
                            <a href="https://www.instagram.com/itz_adi_3011_/?igsh=N2JuZWZ5MnA4NWw%3D" target="_blanck"><i class="fa fa-instagram fa-beat"></i></a>
                            <a href=""><i class="fa fa-youtube fa-beat"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
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
unset($_SESSION['Error_subject']);
unset($_SESSION['Error_name']);
unset($_SESSION['Error_email']);
unset($_SESSION['Error_massage']);

?>