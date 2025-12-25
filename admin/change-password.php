<?php 
session_start();
include "check_login.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Change Password</title>
    <?php include "hedder_link.php"; ?>
</head>

<body class="bg-white">
    <div class="container-fluid position-relative d-flex p-0 bg-white">
        <!-- Sidebar Start -->
        <?php include "sidebar.php"; ?>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content bg-white">
            <!-- Navbar Start -->
            <?php include "navbar.php" ?>
            <!-- Navbar End -->

            <!-- Change Password Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-5">
                            <h4 class="mb-4 text-primary"><i class="fas fa-key me-2"></i>Change Password</h4>
                            <?php
                            if (isset($_GET['msg']) && $_GET['msg'] == 'IVALID') {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>Please fill all required fields.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            if (isset($_GET['change']) && $_GET['change'] == 'Password changed sucessful.') {
                                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>Password changed successfully.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            if (isset($_GET['pass']) && $_GET['pass'] == 'Comfirm password is not matched') {
                                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>Confirm password does not match.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            if (isset($_GET['old']) && $_GET['old'] == 'Old password is wrong') {
                                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-triangle me-2"></i>Old password is incorrect.
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>';
                            }
                            ?>
                            <form action="code/change-password.php" method="post" class="mt-4">
                                <div class="mb-4">
                                    <label for="old_pass" class="form-label fw-bold">Old Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control form-control-lg" id="old_pass" name="old_pass" placeholder="Enter current password">
                                    </div>
                                    <?php
                                    if (isset($_SESSION["old password error"])) {
                                        echo '<div class="text-danger mt-2"><small><i class="fas fa-exclamation-circle me-1"></i>' . $_SESSION["old password error"] . '</small></div>';
                                        unset($_SESSION["old password error"]);
                                    }
                                    ?>
                                </div>
                                <div class="mb-4">
                                    <label for="new_pass" class="form-label fw-bold">New Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control form-control-lg" id="new_pass" name="new_pass" placeholder="Enter new password">
                                    </div>
                                    <?php
                                    if (isset($_SESSION["new password error"])) {
                                        echo '<div class="text-danger mt-2"><small><i class="fas fa-exclamation-circle me-1"></i>' . $_SESSION["new password error"] . '</small></div>';
                                        unset($_SESSION["new password error"]);
                                    }
                                    ?>
                                </div>
                                <div class="mb-4">
                                    <label for="com_pass" class="form-label fw-bold">Confirm Password</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        <input type="password" class="form-control form-control-lg" id="com_pass" name="com_pass" placeholder="Confirm new password">
                                    </div>
                                    <?php
                                    if (isset($_SESSION["comfirm password error"])) {
                                        echo '<div class="text-danger mt-2"><small><i class="fas fa-exclamation-circle me-1"></i>' . $_SESSION["comfirm password error"] . '</small></div>';
                                        unset($_SESSION["comfirm password error"]);
                                    }
                                    ?>
                                </div>
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        <i class="fas fa-sync-alt me-2"></i>Change Password
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Change Password End -->
        </div>
        <!-- Content End -->

        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-white text-white btn-lg-square back-to-top "><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include "jslink.php" ?>
</body>

</html>