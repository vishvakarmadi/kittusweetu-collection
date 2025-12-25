<?php
include "admin/code/connection.php";
include "code/login_check.php";

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Get user details
$user_sql = "SELECT * FROM `user` WHERE `id` = $user_id";
$user_query = mysqli_query($con, $user_sql);
$user_data = mysqli_fetch_array($user_query, MYSQLI_ASSOC);

// Get user's orders
$orders_sql = "SELECT * FROM `orders` WHERE `user_id` = $user_id ORDER BY `created_at` DESC";
$orders_query = mysqli_query($con, $orders_sql);
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

     
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab">Dashboard</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab">Orders</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab">Payment Method</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab">address</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab">Account Details</a>
                            <a class="nav-link" href="code/logout.php">Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Dashboard</h4>
                                <p>
                                    Hello <strong><?=$_SESSION['user_name']?></strong>, welcome to your account dashboard. Here you can view your recent orders, update your account information, and manage your preferences.
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>Order ID</th>
                                                <th>Date</th>
                                                <th>Total</th>
                                                <th>Status</th>
                                                <th>Payment</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $order_count = 0;
                                            while($order_data = mysqli_fetch_array($orders_query, MYSQLI_ASSOC)) {
                                                $order_count++;
                                            ?>
                                            <tr>
                                                <td>#<?=$order_data['id']?></td>
                                                <td><?=$order_data['created_at']?></td>
                                                <td><i class="bi bi-currency-rupee"></i><?=$order_data['total']?></td>
                                                <td>
                                                    <span class="badge 
                                                        <?php 
                                                            if($order_data['status'] == 'pending') echo 'bg-warning';
                                                            elseif($order_data['status'] == 'processing') echo 'bg-info';
                                                            elseif($order_data['status'] == 'shipped') echo 'bg-primary';
                                                            elseif($order_data['status'] == 'delivered') echo 'bg-success';
                                                            elseif($order_data['status'] == 'cancelled') echo 'bg-danger';
                                                            else echo 'bg-secondary';
                                                        ?>">
                                                        <?=ucfirst($order_data['status'])?>
                                                    </span>
                                                </td>
                                                <td><?=$order_data['payment_method']?></td>
                                                <td><a href="order-ditails.php?order_id=<?=$order_data['id']?>" class="btn btn-sm btn-primary">View</a></td>
                                            </tr>
                                            <?php } ?>
                                            <?php if($order_count == 0) { ?>
                                            <tr>
                                                <td colspan="6" class="text-center">No orders found</td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                                <h4>Payment Method</h4>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                                </p> 
                            </div>
                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Address</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Payment Address</h5>
                                        <p><?=$user_data['address']?>, <?=$user_data['city']?>, <?=$user_data['state']?></p>
                                        <p>Mobile: <?=$user_data['mobile']?></p>
                                        <button class="btn btn-sm btn-primary">Edit Address</button>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Shipping Address</h5>
                                        <p><?=$user_data['address']?>, <?=$user_data['city']?>, <?=$user_data['state']?></p>
                                        <p>Mobile: <?=$user_data['mobile']?></p>
                                        <button class="btn btn-sm btn-primary">Edit Address</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <form action="code/profile-update.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" name="first_name" class="form-control" value="<?=$user_data['first_name']?>" placeholder="First Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="last_name" class="form-control" value="<?=$user_data['last_name']?>" placeholder="Last Name">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="mobile" class="form-control" value="<?=$user_data['mobile']?>" placeholder="Mobile">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="email" class="form-control" value="<?=$user_data['email']?>" placeholder="Email">
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" name="address" class="form-control" value="<?=$user_data['address']?>" placeholder="Address">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
                                </form>
                                <h4>Password change</h4>
                                <form action="code/pasword-cange.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="password" name="current_password" class="form-control" placeholder="Current Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="new_password" class="form-control" placeholder="New Password">
                                    </div>
                                    <div class="col-md-6">
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm Password">
                                    </div>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
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