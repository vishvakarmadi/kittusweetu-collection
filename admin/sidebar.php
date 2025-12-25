<?php if (session_status() == PHP_SESSION_NONE) { session_start(); } ?>
        <div class="sidebar bg-dark pe-4 pb-3">
            <nav class="navbar bg-dark navbar-dark">
                <a href="dashbord.php" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-white"><img src="../img/icon_url.png" height="30px" alt=""><span class="ps-2 mt-2">kittusweety</span></h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/aditya.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-dark position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Aditya Vishvakarma</h6>
                        <span>
                            <?php 
                            if(isset($_SESSION['admin_role'])) {
                                echo ucfirst($_SESSION['admin_role']);
                            } else {
                                echo 'Admin';
                            }
                            ?>
                        </span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="dashbord.php" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    
                    <?php 
                    // Role-based menu items
                    $user_role = isset($_SESSION['admin_role']) ? $_SESSION['admin_role'] : 'admin';
                    
                    // Admin and Super Admin can access all features
                    if($user_role == 'admin' || $user_role == 'super_admin') {
                        echo '<a href="mange_product.php" class="nav-item nav-link"><i class="bi bi-bag-check-fill me-2"></i>Product</a>';
                        echo '<a href="mange_category.php" class="nav-item nav-link"><i class="bi bi-tags me-2"></i>Categories</a>';
                        echo '<a href="sub-category-manage.php" class="nav-item nav-link"><i class="bi bi-tag me-2"></i>Sub-Categories</a>';
                        echo '<a href="brand-manage.php" class="nav-item nav-link"><i class="bi bi-alipay me-2"></i>Brand</a>';
                        echo '<a href="slider-manage.php" class="nav-item nav-link"><i class="bi bi-sliders me-2"></i>Slider</a>';
                        echo '<div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"><i class="far fa-file-alt me-2"></i>Orders</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="orders.php" class="dropdown-item">View Orders</a>
                            </div>
                        </div>';
                        echo '<a href="user_ditail.php" class="nav-item nav-link"><i class="fa fa-user me-2"></i>Users</a>';
                        echo '<a href="contact-manage.php" class="nav-item nav-link"><i class="fa fa-envelope me-2"></i>Contact Messages</a>';
                    }
                    
                    // Moderator can access limited features
                    elseif($user_role == 'moderator') {
                        echo '<a href="mange_product.php" class="nav-item nav-link"><i class="bi bi-bag-check-fill me-2"></i>Product</a>';
                        echo '<a href="orders.php" class="nav-item nav-link"><i class="far fa-file-alt me-2"></i>Orders</a>';
                        echo '<a href="contact-manage.php" class="nav-item nav-link"><i class="fa fa-envelope me-2"></i>Contact Messages</a>';
                    }
                    
                    // All roles can change password and logout
                    echo '<a href="change-password.php" class="nav-item nav-link"><i class="fa fa-key me-2"></i>Change Password</a>';
                    echo '<a href="code/logout.php" class="nav-item nav-link"><i class="fa fa-sign-out me-2"></i>Logout</a>';
                    ?>
                </div>
            </nav>
        </div>