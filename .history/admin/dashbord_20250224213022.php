<?php 
session_start();
include "check_login.php";
// print_r($_SESSION);
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>adminEcom</title>
   <?php 
   include "hedder_link.php";
   ?>
</head>

<body class="bg-white">
    <div class="container-fluid position-relative d-flex p-0 bg-white ">
        <!-- Spinner Start -->
        
        <!-- Spinner End -->
        <!-- Sidebar Start -->
        
        <?php include "sidebar.php";?>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content bg-white" >
            <!-- Navbar Start -->
            <?php include "navbar.php"?>
            <!-- Navbar End -->


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-2 px-4 bg-white" >
                <div class="row g-4 " >
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4 ">
                            <i class="fa fa-chart-line fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            


           
            
            <!-- Footer Start -->
            <?//php include "footer.php"?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-white text-white btn-lg-square back-to-top "><i class="bi bi-arrow-up"></i></a>
    </div>

  <?php include "jslink.php"?>  
</body>

</html>
<?php 
?>