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
                <?php
                if (isset($_SESSION['name']) && !empty($_SESSION['name'])) {
                ?>
                    <div class="user">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= $_SESSION['name'] ?></a>
                            <div class="dropdown-menu">
                                <a href="my-account.php" class="dropdown-item">Profile</a>

                            </div>
                        </div>
                        <div class="cart">
                            <?php
                            if (isset($_SESSION['user_id'])) {
                                $count = mysqli_query($con, "SELECT COUNT(`id`)  from `cart` WHERE `user_id`=$_SESSION[user_id] AND `status`=1");
                                $count_data = mysqli_fetch_array($count, MYSQLI_ASSOC);
                                // print_r($count_data);
                            ?>
                                <a href="code/add-card.php"> <i class="fa fa-cart-plus"></i></a>

                                <span>(<?= $count_data['COUNT(`id`)'] ?>)</span>
                            <?php
                            } else { ?>
                                <a href="code/add-card.php"> <i class="fa fa-cart-plus"></i></a>
                                <span>(0)</span>
                            <?php
                            }
                            ?>

                        </div>
                    </div>
                <?php
                } else {
                ?>
                    <div class="user">
                        <div class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account</a>
                            <div class="dropdown-menu">
                                <a href="login.php" class="dropdown-item">Login</a>
                                <a href="Resitaion.php" class="dropdown-item">Register</a>
                            </div>
                        </div>
                        <div class="cart">
                            <i class="fa fa-cart-plus"></i>
                            <span>(0)</span>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>