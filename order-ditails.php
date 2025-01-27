

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "hedder_link.php" ?>
</head>
<?php
// include "check_login.php";
if(isset($_SESSION['user_id'])){
$user_id=$_SESSION['user_id'];}
if(isset($_GET['order_id'])){
$order_id=$_GET['order_id'];}
include "admin/code/connection.php";
 $sql = "SELECT order_details.*, orders.status, orders.sub_total, orders.shipping_charg,orders.total, product.product_name, product.product_img,product.id as pr_id, product.selling_price FROM order_details INNER JOIN product ON order_details.product_id = product.id INNER JOIN orders ON order_details.order_id = orders.id where order_details.order_id=$order_id and user_id=$user_id ;
";
$query = mysqli_query($con, $sql);



?>
<body>
    <!-- Top Header Start -->
    <?php include "heder.php" ?>
    <!-- Top Header End -->


    <!-- navbar Start -->
    <?php include "navbar.php" ?>
    <!-- navbar End -->


    <!-- main contant Start  -->
    <?php include "Breadcrumb.php" ?>
     <!-- Cart Start -->
     <div class="cart-page">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php 
                                    if(isset($_SESSION["user_id"])){

                                    while($pro_data=mysqli_fetch_array($query ,MYSQLI_ASSOC)){
                                        
                                    ?>

                                    <tr>
                                        <td><a href="product-detail.php?id=<?=$pro_data["pr_id"]?>"><img src="admin/uplode/product/<?= $pro_data["product_img"]?>" alt="Image"></a></td>
                                        <td><a href="product-detail.php?id=<?=$pro_data["pr_id"]?>"><?= $pro_data["product_name"]?></a></td>
                                        <td><i class="bi bi-currency-rupee"></i><?= $pro_data["selling_price"]?></td>
                                        <td>
                                        <?php  echo $pro_data["qty"]?>
                                        </td>
                                        <td><i class="bi bi-currency-rupee"><?= $pro_data["selling_price"]*$pro_data["qty"]?></td>
                                        <td><?= $pro_data["status"]?></td>
                                        
                                    </tr>
                                    <?php 
                                   
                                    }
                                    
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                    <div class="cart-summary">
                            <div class="cart-content">
                                <h3>Order Address</h3>
                                <?php 
                                $order_add="SELECT * FROM `order_address` WHERE `user_id`=$user_id AND `order_id`=$order_id";
                                $query=mysqli_query($con,$order_add);
                                $address_data=mysqli_fetch_array($query,MYSQLI_ASSOC);
                                // print_r($address_data);
                                ?>
                                <p>UserName<span></i><?=$address_data['name']?></span></p>
                                <p>Mobile<span><?=$address_data['mobile']?></span></p>

                                <p>Email<span><?=$address_data['email']?></span></p>
                                
                                <h4></h4>
                                <p>City<span><?=$address_data['city']?></span></p>
                                <p>state<span><?=$address_data['state']?></span></p>
                                <p>Pin Code<span><?=$address_data['pin_code']?></span></p>
                                <p>country<span><?=$address_data['country']?></span></p>
                                <h4></span></h4>
                                
                                
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-summary">
                            <div class="cart-content">
                                <?php 
                                $res=mysqli_query($con,"SELECT * FROM `orders` WHERE `user_id`=$user_id AND `id`=$order_id");
                                $data=mysqli_fetch_array($res,MYSQLI_ASSOC);
                                // print_r($data);
                                ?>
                                <h3>Order Summary</h3>
                                <p>Payment Method<span></i><?=$data['payment_method']?></span></p>
                                <p>Sub Total<span><i class="bi bi-currency-rupee"></i><?=$data['sub_total']?></span></p>
                                <p>Shipping Cost<span><i class="bi bi-currency-rupee"></i><?php echo $data["shipping_charg"]?></span></p>
                                <h4>Grand Total<span><i class="bi bi-currency-rupee"></i><?=$data["total"]?></span></h4>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cart End -->
    <!-- main contant End  -->

    <!-- Footer Start -->
    <?php include "footer.php" ?>
    <!-- Footer Bottom End -->


    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include "footer_link.php" ?>
</body>
<script>
    const cartRemove=(id)=>{
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, Remove it!"
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href="code/remove-cart.php?id="+id;
            }
        });
    }
</script>
</html>