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
 $sql = "SELECT * FROM `user` WHERE `id`=$user_id";
$query = mysqli_query($con, $sql);
$row=mysqli_fetch_array($query);
// print_r($row);
$sql1 = "SELECT cart.*, product.product_name,product.id AS pr_id ,product.product_img,product.selling_price FROM cart  INNER JOIN product ON cart.product_id = product.id WHERE cart.user_id = '$user_id' and cart.`status`=1 ORDER BY cart.id DESC;";
$query1 = mysqli_query($con, $sql1);
}
?>
<body>
    <!-- Top Header Start -->
    <?php include "heder.php" ?>
    <!-- Top Header End -->


    <!-- navbar Start -->
    <?php include "navbar.php" ?>

    <!-- navbar End -->

    <?php include "Breadcrumb.php" ?>

    <!-- main contant Start  -->
 <!-- Checkout Start -->
 <div class="checkout">
            <div class="container"> 
                <form action="code/checkout.php" method="post">
                <div class="row">
                    <div class="col-md-7">
                        <div class="billing-address">
                            <h2>Billing Address</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" value="<?=$row["first_name"]?>" name="first_name" placeholder="First Name">
                                    <p style="color: red;">
                                        <?php 
                                        
                                        if(isset($_SESSION['Error_first_name'])){
                                            echo $_SESSION['Error_first_name'];
                                        }
                                //    echo '<pre>';
                                        // print_r($_SESSION);
                                        ?>
                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input class="form-control" type="text" value="<?=$row["last_name"]?>"  name="last_name" placeholder="Last Name">
                                    <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_last_name'])){
                                        echo $_SESSION['Error_last_name'];
                                    }
                                    ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" value="<?=$row["email"]?>"  type="text" name="email" placeholder="E-mail">
                                    <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_email'])){
                                        echo $_SESSION['Error_email'];
                                    }
                                    ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" value="<?=$row["mobile"]?>" name="mobile" placeholder="Mobile No">
                                    <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_mobile'])){
                                        echo $_SESSION['Error_mobile'];
                                    }
                                    ?></p>
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" value="<?=$row["address"]?>" name="address"  placeholder="Address">
                                    <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_address'])){
                                        echo $_SESSION['Error_address'];
                                    }
                                    ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <select class="custom-select" name="country">
                                        <option selected>United States</option>
                                        <option value="india">India</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                    <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_State'])){
                                        echo $_SESSION['Error_State'];
                                    }
                                    ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input class="form-control" type="text" placeholder="City" name="City">
                                    <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_City'])){
                                        echo $_SESSION['Error_City'];
                                    }
                                    ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label>State</label>
                                    <input class="form-control" type="text" placeholder="State" name="State">
                                    <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_State'])){
                                        echo $_SESSION['Error_State'];
                                    }
                                    ?></p>
                                </div>
                                <div class="col-md-6">
                                    <label>Pin Code</label>
                                    <input class="form-control" type="text" placeholder="Pin Code" name="pin_code">
                                    <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_pin_code'])){
                                        echo $_SESSION['Error_pin_code'];
                                    }
                                    ?></p>
                                </div>
                                
                             
                            </div>
                        </div>
                        
                        <div class="shipping-address">
                            <h2>Shipping Address</h2>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>First Name</label>
                                    <input class="form-control" type="text" placeholder="First Name">
                                    <p class="danger">
                                        

                                    </p>
                                </div>
                                <div class="col-md-6">
                                    <label>Last Name"</label>
                                    <input class="form-control" type="text" placeholder="Last Name">
                                </div>
                                <div class="col-md-6">
                                    <label>E-mail</label>
                                    <input class="form-control" type="text" placeholder="E-mail">
                                </div>
                                <div class="col-md-6">
                                    <label>Mobile No</label>
                                    <input class="form-control" type="text" placeholder="Mobile No">
                                </div>
                                <div class="col-md-12">
                                    <label>Address</label>
                                    <input class="form-control" type="text" placeholder="Address">
                                </div>
                                <div class="col-md-6">
                                    <label>Country</label>
                                    <select class="custom-select">
                                        <option selected value="india">india</option>
                                        <option>Afghanistan</option>
                                        <option>Albania</option>
                                        <option>Algeria</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>City</label>
                                    <input class="form-control" type="text" placeholder="City">
                                </div>
                                <div class="col-md-6">
                                    <label>State</label>
                                    <input class="form-control" type="text" placeholder="State">
                                </div>
                                <div class="col-md-6">
                                    <label>ZIP Code</label>
                                    <input class="form-control" type="text" placeholder="ZIP Code">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="checkout-summary">
                            <h2>Cart Total</h2>
                            <div class="checkout-content">
                                <h3>Products</h3>
                               
                                <?php 
                                 $price_count=0;
                                 $shoping_count=0;
                                while($data=mysqli_fetch_array($query1,MYSQLI_ASSOC)){
                                   ?>
                                <p><?=$data["product_name"]?><span><i class="bi bi-currency-rupee"></i><?php echo $data["selling_price"]*$data["quantity"]?></span></p>
                                <?php
                                $price_count=$price_count+$data["selling_price"]*$data["quantity"];
                             }?>
                                <p class="sub-total">Sub Total<span><i class="bi bi-currency-rupee"></i><?php echo $price_count?></span></p>
                                <p class="ship-cost">Shipping Cost<span><i class="bi bi-currency-rupee"></i> <?php echo $shoping_count= $shoping_count+50 ?></span></p>
                                <h4>Grand Total<span><i class="bi bi-currency-rupee"></i><?=$price_count +$shoping_count?></span></h4>
                            </div>
                            <input type="hidden" name="Sub_total" id="" value="<?= $price_count ?>">
                            <input type="hidden" name="Shipping_Cost" id="" value="<?= $shoping_count ?>">
                            <input type="hidden" name="total" id="" value="<?= $price_count+$shoping_count ?>">
                        </div>
                        
                        <div class="checkout-payment">
                            <h2>Payment Methods</h2>
                            <div class="payment-methods">
                                <div class="payment-method">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" class="custom-control-input" value="cash_on_delevery" id="payment-1" name="payment">
                                        <label class="custom-control-label" for="payment-1">Cash On delevery</label>
                                        <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_payment'])){
                                        echo $_SESSION['Error_payment'];
                                    }
                                    ?></p>
                                        <p style="color:red;"><?php 
                                    if(isset($_SESSION['Error_payment'])){
                                        echo $_SESSION['Error_payment'];
                                    }
                                    ?></p>
                                    </div>
                                    <div class="payment-content" id="payment-1-show" >
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras tincidunt orci ac eros volutpat maximus lacinia quis diam.
                                        </p>
                                    </div>
                                </div>
                              
                            </div>
                            <div class="checkout-btn">
                                <button>Place Order</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- Checkout End -->
    
    <!-- main contant End  -->

    <!-- Footer Start -->
    <?php include "footer.php" ?>
    <!-- Footer Bottom End -->


    <!-- Back to Top -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>


    <!-- JavaScript Libraries -->
    <?php include "footer_link.php" ;
    unset($_SESSION['Error_City']);
    unset($_SESSION['Error_State']);
    unset($_SESSION['Error_pin_code']);
    unset($_SESSION['Error_payment']);
    unset($_SESSION['Error_first_name']);
    unset($_SESSION['Error_last_name']);
    unset($_SESSION['Error_email']);
    unset($_SESSION['Error_mobile']);
    unset($_SESSION['Error_address']);
    
    ?>
</body>

</html>
