<?php
include "check_login.php";
include "code/connection.php";

// Get all contact messages
$sql = "SELECT * FROM `contact_us` ORDER BY `created_at` DESC";
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact Messages</title>
    <?php include "hedder_link.php"; ?>
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <?php include "spineer.php" ?>
        <!-- Spinner End -->
        
        <!-- Sidebar Start -->
        <?php include "sidebar.php"; ?>
        <!-- Sidebar End -->
        
        <!-- Content Start -->
        <div class="content bg-white">
            <!-- Navbar Start -->
            <?php include "navbar.php" ?>
            <!-- Navbar End -->
            
            <!-- Contact Messages Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-12">
                        <div class="bg-light rounded h-100 p-4">
                            <h3 class="mb-4">Contact Messages</h3>
                            <h5 class="text-success mb-4">
                                <?php
                                if (isset($_GET["msg"])) {
                                    echo $_GET["msg"];
                                }
                                ?>
                            </h5>
                            <div class="table-responsive">
                                <table class="table text-dark" id="contact" style="width:100%">
                                    <thead>
                                        <tr class="text-center">
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Subject</th>
                                            <th scope="col">Message</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i = 0;
                                        while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                        ?>
                                        <tr class="text-dark">
                                            <th scope="row"><?php echo ++$i ?></th>
                                            <td><?php echo $data['name'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                            <td><?php echo $data['subject'] ?></td>
                                            <td><?php echo substr($data['message'], 0, 50) . (strlen($data['message']) > 50 ? '...' : '') ?></td>
                                            <td><?php echo $data['created_at'] ?></td>
                                        </tr>
                                        <?php
                                        }                         
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Messages Content End -->
            
            <!-- Footer Start -->
            <?php //include "footer.php" ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
        
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
    <?php include "jslink.php" ?>
    <?php include "js/datatable.php"?>
</body>
</html>