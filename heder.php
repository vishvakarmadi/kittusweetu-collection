<?php if (session_status() == PHP_SESSION_NONE) { session_start(); } ?>
<div class="top-header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-3">
                <div class="logo">
                    <a href="">
                        <img src="img/logo.png" alt="Logo">
                    </a>
                </div>
            </div>
            <div class="col-md-6">
                <div class="search">
                    <input type="text" placeholder="Search">
                    <button><i class="fa fa-search"></i></button>
                </div>
            </div>
            <div class="col-md-3">
                <div class="user">
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        // User is logged in
                        echo '<div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, ' . $_SESSION['user_name'] . '</a>
                                    <div class="dropdown-menu">
                                        <a href="my-account.php" class="dropdown-item">My Account</a>
                                        <a href="code/logout.php" class="dropdown-item">Logout</a>
                                    </div>
                                </div>';
                    } else {
                        // User is not logged in
                        echo '<div class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                                    <div class="dropdown-menu">
                                        <a href="login.php" class="dropdown-item">Login</a>
                                        <a href="Resitaion.php" class="dropdown-item">Register</a>
                                    </div>
                                </div>';
                    }
                    ?>
                    <div class="cart">
                        <i class="fa fa-cart-plus"></i>
                        <span>(0)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>