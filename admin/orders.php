<?php
include "check_login.php";

include "code/connection.php";

                                        
$sql = "SELECT orders.*, user.first_name, user.last_name 
        FROM `orders` 
        INNER JOIN `user` 
        ON orders.user_id = user.id;";                                       
                                                           
$query = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mange catagry</title>
    <?php
    include "hedder_link.php";
    ?>
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
            <!-- new conttent add satrt  -->
            <div class="col-12">
                <div class="bg-white rounded h-100 p-4">
                    <h3 style="color: black;" class="mb-4"><u>Mange Slider</u></h3>
                    <h5 style="color:green;">
                        <?php
                        if (isset($_GET["msg"])) {
                            echo $_GET["msg"];
                        }
                        ?>
                    </h5>
                    <div class="table-responsive">
                        <table class="table text-dark" id="category" style="width:100%">
                            <thead>
                                <tr class="text-center">
                                    <th scope="col">order id</th>
                                    <th scope="col">User Name</th>      
                                    <th scope="col">Sub Total</th>      
                                    <th scope="col">Shipping Charg</th>      
                                    <th scope="col">Total</th>      
                                    <th scope="col">Payment Method </th>
                                    <th scope="col">status</th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i=0;
                                 while ($data = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
                                   

                                ?>
                                    <tr class="text-center" style="color: black;">
                                        <th scope="row"><?=$data["id"] ?></th>
                                        
                                        <td><?php echo  $data["first_name"]." ".$data["last_name"] ?></th>
                                                   <td><?php echo $data["sub_total"] ?></th>
                                                   <td><?php echo $data["shipping_charg"] ?></th>
                                                   <td><?php echo $data["total"] ?></th>
                                                   <td><?php echo $data["payment_method"] ?></th>
                                                   <td><?php echo $data["status"] ?></th>
                                                   <td><?php echo $data["created_at"] ?></th>
                                        <td><button class="btn bg-dark text-white" onclick="orderView(<?php echo $data['id'] ?>)">view</button></td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- new conttent add  end -->

            <!-- Footer Start -->
            <?php //include "footer.php" 
            ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <?php include "jslink.php" ?>
</body>
<script>
   
    function orderView(id) {

        Swal.fire({
            title: "Are you sure?",
            text: "You view be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, view it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="order_ditails.php?order_id="+id;
            }
        });

    }
</script>
<?php include "js/datatable.php"?>


</html>