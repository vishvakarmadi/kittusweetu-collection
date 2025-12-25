<?php 
if (session_status() == PHP_SESSION_NONE) { 
    session_start(); 
}

include "code/connection.php";

// Get recent contact messages
$contact_sql = "SELECT * FROM `contact_us` ORDER BY `created_at` DESC LIMIT 5";
$contact_query = mysqli_query($con, $contact_sql);

// Get recent orders
$order_sql = "SELECT * FROM `orders` ORDER BY `created_at` DESC LIMIT 5";
$order_query = mysqli_query($con, $order_sql);

// Count recent messages (last 7 days)
$recent_contact_sql = "SELECT COUNT(*) as count FROM `contact_us` WHERE `created_at` >= DATE_SUB(NOW(), INTERVAL 7 DAY)";
$recent_contact_result = mysqli_query($con, $recent_contact_sql);
$recent_contact_data = mysqli_fetch_array($recent_contact_result, MYSQLI_ASSOC);
$contact_count = $recent_contact_data['count'];

// Count pending orders
$pending_orders_sql = "SELECT COUNT(*) as count FROM `orders` WHERE `status` = 'pending'";
$pending_orders_result = mysqli_query($con, $pending_orders_sql);
$pending_orders_data = mysqli_fetch_array($pending_orders_result, MYSQLI_ASSOC);
$pending_orders_count = $pending_orders_data['count'];

// Count total notifications (pending orders + new messages)
$total_notifications = $contact_count + $pending_orders_count;
?>
 <!-- Navbar Start -->
 <nav class="navbar navbar-expand bg-dark navbar-dark sticky-top px-4 py-0 text-white" style="border-bottom:3px solid white;">
     <a href="dashbord.php" class="navbar-brand d-flex d-lg-none me-4">
         <h2 class="text-white mb-0"><i class="fa fa-user-edit"></i></h2>
     </a>
     <a href="#" class="sidebar-toggler flex-shrink-0">
         <i class="fa fa-bars"></i>
     </a>
     <form class="d-none d-md-flex ms-4">
         <input class="form-control bg-white border-0" type="search" placeholder="Search">
     </form>
     <div class="navbar-nav align-items-center ms-auto">
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 <i class="fa fa-envelope me-lg-2"></i>
                 <span class="d-none d-lg-inline-flex">Message</span>
                 <?php if($contact_count > 0) { ?>
                 <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                     <?=$contact_count?>
                     <span class="visually-hidden">unread messages</span>
                 </span>
                 <?php } ?>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                 <?php 
                 $contact_count_check = 0;
                 while($contact_data = mysqli_fetch_array($contact_query, MYSQLI_ASSOC)) {
                     $contact_count_check++;
                 ?>
                 <a href="contact-manage.php" class="dropdown-item">
                     <div class="d-flex align-items-center">
                         <div class="ms-2">
                             <h6 class="fw-normal mb-0">New message from <?=$contact_data['name']?></h6>
                             <small><?=$contact_data['created_at']?></small>
                         </div>
                     </div>
                 </a>
                 <hr class="dropdown-divider">
                 <?php } ?>
                 <?php if($contact_count_check == 0) { ?>
                 <a href="#" class="dropdown-item">
                     <div class="d-flex align-items-center">
                         <div class="ms-2">
                             <h6 class="fw-normal mb-0">No new messages</h6>
                         </div>
                     </div>
                 </a>
                 <hr class="dropdown-divider">
                 <?php } ?>
                 <a href="contact-manage.php" class="dropdown-item text-center">See all messages</a>
             </div>
         </div>
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 <i class="fa fa-bell me-lg-2"></i>
                 <span class="d-none d-lg-inline-flex">Notifications</span>
                 <?php if($total_notifications > 0) { ?>
                 <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                     <?=$total_notifications?>
                     <span class="visually-hidden">unread notifications</span>
                 </span>
                 <?php } ?>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-dark border-0 rounded-0 rounded-bottom m-0 notifications">
                 <?php 
                 $order_count_check = 0;
                 while($order_data = mysqli_fetch_array($order_query, MYSQLI_ASSOC)) {
                     $order_count_check++;
                 ?>
                 <a href="orders.php" class="dropdown-item">
                     <h6 class="fw-normal mb-0">New order #<?=$order_data['id']?> placed</h6>
                     <small><?=$order_data['created_at']?></small>
                 </a>
                 <hr class="dropdown-divider">
                 <?php } ?>
                 <?php if($order_count_check == 0) { ?>
                 <a href="#" class="dropdown-item">
                     <h6 class="fw-normal mb-0">No new notifications</h6>
                 </a>
                 <hr class="dropdown-divider">
                 <?php } ?>
                 <a href="orders.php" class="dropdown-item text-center">See all notifications</a>
             </div>
         </div>
         <div class="nav-item dropdown">
             <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                 <img class="rounded-circle me-lg-2" src="img/aditya.jpg" alt="" style="width: 40px; height: 40px;">
                 <span class="d-none d-lg-inline-flex">
                     <?php
                        // Get user name from session (using email as the display name)
                        $user_name = isset($_SESSION['email']) ? $_SESSION['email'] : 'Admin User';
                        echo $user_name;
                        
                        // Display user role if available
                        if (isset($_SESSION['admin_role'])) {
                            echo ' (' . ucfirst($_SESSION['admin_role']) . ')';
                        }
                        ?>
                 </span>
             </a>
             <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                 <a href="#" class="dropdown-item">My Profile</a>
                 <a href="change-password.php" class="dropdown-item">Change password</a>
                 <a href="#" class="dropdown-item">Settings</a>
                 <a href="code/logout.php" class="dropdown-item">Log Out</a>
             </div>
         </div>
     </div>
 </nav>
 <!-- Navbar End -->