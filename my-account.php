<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "hedder_link.php" ?>
</head>

<?php include "code/login_check.php" ?>

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
            <h5 class="text-danger">
                <?php
                if (isset($_GET['msg'])) {
                    echo $_GET['msg'];
                }
                ?>
            </h5>
            <h5 style="color: green;">
                <?php
                if (isset($_GET['msg1'])) {
                    echo $_GET['msg1'];
                }
                ?>
            </h5>
            <div class="row">
                <div class="col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab">Dashboard</a>
                        <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab">Orders</a>
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
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. In condimentum quam ac mi viverra dictum. In efficitur ipsum diam, at dignissim lorem tempor in. Vivamus tempor hendrerit finibus. Nulla tristique viverra nisl, sit amet bibendum ante suscipit non. Praesent in faucibus tellus, sed gravida lacus. Vivamus eu diam eros. Aliquam et sapien eget arcu rhoncus scelerisque.
                            </p>
                        </div>
                        <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Sub Total</th>
                                            <th>Shipping Charg</th>
                                            <th>Total</th>
                                            <th>payment Method</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_SESSION['user_id'])){
                                            $user_id=$_SESSION['user_id'];
                                        }
                                        $sql = "SELECT * FROM `orders` WHERE `user_id`=$user_id";
                                        $result=mysqli_query($con,$sql);
                                        $sr=0;
                                        while($data=mysqli_fetch_array($result)){
                                            $sr++;
// print_r($data);
                                        ?>

                                        <tr>
                                            
                                            <td><?php echo $data["id"] ?></td>
                                            <td><?php echo $data["sub_total"] ?></td>
                                            <td><?php echo $data["shipping_charg"] ?></td>
                                            <td><?php echo $data["total"] ?></td>
                                            <td><?php echo $data["payment_method"] ?></td>
                                            <td><?php echo $data["status"] ?></td>
                                            <td><?php echo $data["created_at"] ?></td>
                                            
                                            <td><a href="order-ditails.php?order_id=<?php echo $data["id"] ?>"><button>View</button></a></td>
                                        </tr>
                                        <?php 
                                        }
                                        
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                            <h4>Address</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <h5>Payment Address</h5>
                                    <p>123 Payment Street, Los Angeles, CA</p>
                                    <p>Mobile: 012-345-6789</p>
                                    <button>Edit Address</button>
                                </div>
                                <div class="col-md-6">
                                    <h5>Shipping Address</h5>
                                    <p>123 Shipping Street, Los Angeles, CA</p>
                                    <p>Mobile: 012-345-6789</p>
                                    <button>Edit Address</button>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                            <h4>Account Details</h4>
                            <?php
                            $user_id = $_SESSION["user_id"];
                            include "../admin/code/connection.php";
                            $sql = "SELECT * FROM `user` WHERE `id`=$user_id";
                            $result = mysqli_query($con, $sql);
                            $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            print_r(value: $_SESSION);
                            ?>
                            <form action="code/profile-update.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <input type="text" placeholder="First Name" value="<?= $data['first_name'] ?>" name="first_name">
                                        <p class="text-danger">
                                            <?php
                                            if (isset($_SESSION['Error_first_name'])) {
                                                echo $_SESSION['Error_first_name'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Last Name" value="<?= $data['last_name'] ?>" name="last_name">
                                        <p class="text-danger">
                                            <?php
                                            if (isset($_SESSION['Error_last_name'])) {
                                                echo $_SESSION['Error_last_name'];
                                            }
                                            ?>
                                        </p>

                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Mobile" value="<?= $data['mobile'] ?>" disabled>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Email" value="<?= $data['email'] ?> " disabled>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="text" placeholder="Enter Your Address..  " name="address" value="<?= $data["address"] ?>">
                                        <p class="text-danger">
                                            <?php
                                            if (isset($_SESSION['Error_address'])) {
                                                echo $_SESSION['Error_address'];
                                            }
                                            ?>
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <button>Update Account</button>
                                        <br><br>
                                    </div>
                                </div>
                            </form>
                            <h4>Password change</h4>
                            <p><?php
                                // print_r($_SESSION);
                                ?></p>
                            <form action="code/pasword-cange.php" method="post">
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="password" name="current_password" placeholder="Current Password">
                                        <p class="text-danger"><?php
                                                                if (isset($_SESSION['Error_current_password'])) {
                                                                    echo $_SESSION['Error_current_password'];
                                                                }
                                                                ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="New Password" name="New_Password">
                                        <p class="text-danger"><?php
                                                                if (isset($_SESSION['Error_New_Password'])) {
                                                                    echo $_SESSION['Error_New_Password'];
                                                                }
                                                                ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" placeholder="Confirm Password" name="Confirm_Password">
                                        <p class="text-danger"><?php
                                                                if (isset($_SESSION['Error_Confirm_Password'])) {
                                                                    echo $_SESSION['Error_Confirm_Password'];
                                                                }
                                                                ?></p>
                                    </div>
                                    <div class="col-md-12">
                                        <button>Save Changes</button>
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
<?php
unset($_SESSION['Error_current_password']);
unset($_SESSION['Error_New_Password']);
unset($_SESSION['Error_Confirm_Password']);
?>