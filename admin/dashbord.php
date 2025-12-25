<?php 
include "check_login.php";
include "code/connection.php";

// Get today's date
$today = date('Y-m-d');

// Today Sale
$today_sale_sql = "SELECT SUM(total) as today_sale FROM orders WHERE DATE(created_at) = '$today'";
$today_sale_result = mysqli_query($con, $today_sale_sql);
$today_sale_data = mysqli_fetch_array($today_sale_result, MYSQLI_ASSOC);
$today_sale = $today_sale_data['today_sale'] ? $today_sale_data['today_sale'] : 0;

// Total Sale
$total_sale_sql = "SELECT SUM(total) as total_sale FROM orders";
$total_sale_result = mysqli_query($con, $total_sale_sql);
$total_sale_data = mysqli_fetch_array($total_sale_result, MYSQLI_ASSOC);
$total_sale = $total_sale_data['total_sale'] ? $total_sale_data['total_sale'] : 0;

// Count total orders
$total_orders_sql = "SELECT COUNT(*) as total_orders FROM orders";
$total_orders_result = mysqli_query($con, $total_orders_sql);
$total_orders_data = mysqli_fetch_array($total_orders_result, MYSQLI_ASSOC);
$total_orders = $total_orders_data['total_orders'];

// Count today's orders
$today_orders_sql = "SELECT COUNT(*) as today_orders FROM orders WHERE DATE(created_at) = '$today'";
$today_orders_result = mysqli_query($con, $today_orders_sql);
$today_orders_data = mysqli_fetch_array($today_orders_result, MYSQLI_ASSOC);
$today_orders = $today_orders_data['today_orders'];

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
                                <h6 class="mb-0">₹<?php echo number_format($today_sale, 2); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">₹<?php echo number_format($total_sale, 2); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Orders</p>
                                <h6 class="mb-0"><?php echo $today_orders; ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-dark rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-white"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Orders</p>
                                <h6 class="mb-0"><?php echo $total_orders; ?></h6>
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