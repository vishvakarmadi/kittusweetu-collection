

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include "hedder_link.php" ?>
</head>
<?php
// include "check_login.php";
if(isset($_SESSION['user_id'])){
$user_id=$_SESSION['user_id'];
include "admin/code/connection.php";
 $sql = "SELECT cart.*, product.product_name,product.id AS pr_id ,product.product_img,product.selling_price  FROM cart  INNER JOIN product ON cart.product_id = product.id WHERE cart.user_id = '$user_id' and cart.`status`=1 ORDER BY cart.id DESC;";
$query = mysqli_query($con, $sql);
}


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
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody class="align-middle">
                                    <?php 
                                    if(isset($_SESSION["user_id"])){

                                    $price_count=0;
                                    while($pro_data=mysqli_fetch_array($query ,MYSQLI_ASSOC)){
                                        // print_r($pro_data);
                                    ?>

                                    <tr>
                                        <td><a href="product-detail.php?id=<?=$pro_data["pr_id"]?>"><img src="admin/uplode/product/<?= $pro_data["product_img"]?>" alt="Image"></a></td>
                                        <td><a href="product-detail.php?id=<?=$pro_data["pr_id"]?>"><?= $pro_data["product_name"]?></a></td>
                                        <td><i class="bi bi-currency-rupee"></i><?= $pro_data["selling_price"]?></td>
                                        <td>
                                            <div class="qty">
                                                <a href="code/update-card.php?id=<?= $pro_data["id"]?>&&qty=minus" class="btn-minus"><i class="fa fa-minus"></i></a>
                                                <input type="text" value="<?php  echo $pro_data["quantity"]?>" >
                                                <a href="code/update-card.php?id=<?= $pro_data["id"]?>&&qty=plus" class="btn-plus"><i class="fa fa-plus"></i></a>
                                            </div>
                                        </td>
                                        <td><i class="bi bi-currency-rupee"></i><?= $pro_data["selling_price"]*$pro_data["quantity"]?></td>
                                        <td><button onclick="cartRemove(<?= $pro_data['id']?>)"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                    <?php 
                                    $price_count=$price_count+$pro_data["selling_price"]*$pro_data["quantity"];
                                    }}
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="coupon">
                            <!-- <input type="text" placeholder="Coupon Code">
                            <button>Apply Code</button> -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-summary">
                            <div class="cart-content">
                                <h3>Cart Summary</h3>
                                <p>Sub Total<span><i class="bi bi-currency-rupee"></i><?=$price_count?></span></p>
                                <p>Shipping Cost<span><i class="bi bi-currency-rupee"></i>50</span></p>
                                <h4>Grand Total<span><i class="bi bi-currency-rupee"></i><?= $price_count+50 ?></span></h4>
                            </div>
                            <div class="cart-btn">
                                <a href="chechout.php" class=""><button>Checkout</button></a>
                            </div>
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