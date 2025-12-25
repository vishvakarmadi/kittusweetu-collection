<?php
$message = '';
if (isset($_GET['msg'])) {
    $message = $_GET['msg'];
}
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

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <div class="thank-you-content">
                    <i class="fa fa-check-circle text-success" style="font-size: 5rem;"></i>
                    <h1 class="mt-4">Thank You!</h1>
                    <p class="lead mt-3">Your order has been placed successfully.</p>
                    <p><?=$message?></p>
                    <?php 
                    if (strpos($message, 'Payment') !== false) {
                        echo '<p>Payment processing completed. You will receive an email confirmation shortly.</p>';
                    } else {
                        echo '<p>Order confirmation details will be sent to your registered email address.</p>';
                    }
                    ?>
                    <div class="mt-4">
                        <a href="index.php" class="btn btn-primary me-2">Continue Shopping</a>
                        <a href="my-account.php" class="btn btn-outline-primary">View My Orders</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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