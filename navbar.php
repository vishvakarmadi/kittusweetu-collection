<?php if (session_status() == PHP_SESSION_NONE) { session_start(); } ?>
        <div class="header">
            <div class="container">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav m-auto">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="product-list.php" class="nav-item nav-link">Products</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                <div class="dropdown-menu" id="nav1">
                                    <a href="product-list.php" class="dropdown-item">Product</a>
                                    <a href="product-detail.php" class="dropdown-item">Product Detail</a>
                                    <a href="cart.php" class="dropdown-item">Cart</a>
                                    <a href="wishlist.php" class="dropdown-item">Wishlist</a>
                                    <a href="checkout.php" class="dropdown-item">Checkout</a>
                                    <?php 
                                    if (isset($_SESSION['user_id'])) {
                                        // User is logged in
                                        echo '<a href="my-account.php" class="dropdown-item">My Account</a>';
                                        echo '<a href="code/logout.php" class="dropdown-item">Logout</a>';
                                    } else {
                                        // User is not logged in
                                        echo '<a href="login.php" class="dropdown-item">Login & Register</a>';
                                        echo '<a href="Resitaion.php" class="dropdown-item">Register</a>';
                                    }
                                    ?>
                                </div>
                            </div>
                            <a href="contact.php" class="nav-item nav-link">Contact Us</a>
                        </div>
                        <?php 
                        if (isset($_SESSION['user_id'])) {
                            // Show user greeting when logged in
                            echo '<div class="navbar-nav ml-auto">
                                <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Welcome, ' . $_SESSION['user_name'] . '</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="my-account.php" class="dropdown-item">My Account</a>
                                        <a href="code/logout.php" class="dropdown-item">Logout</a>
                                    </div>
                                </div>
                            </div>';
                        }
                        ?>
                    </div>
                </nav>
            </div>
        </div>