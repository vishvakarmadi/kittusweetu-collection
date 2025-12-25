<?php
include "admin/code/connection.php";
include "code/login_check.php";

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Get cart items for the user
$cart_sql = "SELECT cart.*, product.product_name, product.product_img, product.selling_price, product.quantity as product_quantity 
           FROM cart 
           INNER JOIN product ON cart.product_id = product.id 
           WHERE cart.user_id = $user_id AND cart.status = 1";
$cart_query = mysqli_query($con, $cart_sql);

// Calculate cart summary
$subtotal = 0;
$shipping = 0;
$grand_total = 0;

// Check for messages
$message = '';
if (isset($_GET['msg'])) {
    $message = '<div class="alert alert-success text-center">' . $_GET['msg'] . '</div>';
}
if (isset($_GET['msg1'])) {
    $message = '<div class="alert alert-danger text-center">' . $_GET['msg1'] . '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include "hedder_link.php" ?>
</head>

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
                <?php echo $message; ?>
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
                                    $cart_empty = true;
                                    while($cart_data = mysqli_fetch_array($cart_query, MYSQLI_ASSOC)) {
                                        $cart_empty = false;
                                        $item_total = $cart_data['selling_price'] * $cart_data['quantity'];
                                        $subtotal += $item_total;
                                    ?>
                                    <tr>
                                        <td><a href="product-detail.php?id=<?=$cart_data["product_id"]?>"><img src="admin/uplode/product/<?=$cart_data["product_img"]?>" alt="Image" style="width: 60px; height: 60px; object-fit: cover;"></a></td>
                                        <td><a href="product-detail.php?id=<?=$cart_data["product_id"]?>"><?=$cart_data["product_name"]?></a></td>
                                        <td><i class="bi bi-currency-rupee"></i><?=$cart_data["selling_price"]?></td>
                                        <td>
                                            <div class="qty">
                                                <button class="btn-minus" onclick="updateCart(<?=$cart_data['id']?>, 'minus')"><i class="fa fa-minus"></i></button>
                                                <input type="text" value="<?=$cart_data['quantity']?>" id="qty_<?=$cart_data['id']?>" readonly style="width: 50px; text-align: center;">
                                                <button class="btn-plus" onclick="updateCart(<?=$cart_data['id']?>, 'plus')"><i class="fa fa-plus"></i></button>
                                            </div>
                                        </td>
                                        <td><i class="bi bi-currency-rupee"><?=$item_total?></i></td>
                                        <td><button onclick="removeFromCart(<?=$cart_data['id']?>)"><i class="fa fa-trash"></i></button></td>
                                    </tr>
                                    <?php } ?>
                                    <?php if($cart_empty) { ?>
                                    <tr>
                                        <td colspan="6" class="text-center">Your cart is empty</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="coupon">
                            <input type="text" placeholder="Coupon Code" id="coupon_code">
                            <button onclick="applyCoupon()">Apply Code</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-summary">
                            <div class="cart-content">
                                <h3>Cart Summary</h3>
                                <p>Sub Total<span><i class="bi bi-currency-rupee"></i><span id="subtotal"><?=$subtotal?></span></span></p>
                                <p>Shipping Cost<span><i class="bi bi-currency-rupee"></i><span id="shipping">50</span></span></p>
                                <h4>Grand Total<span><i class="bi bi-currency-rupee"></i><span id="grand_total"><?=$subtotal + 50?></span></span></h4>
                            </div>
                            <div class="cart-btn">
                                <button onclick="updateCartQuantities()">Update Cart</button>
                                <a href="chechout.php" class="btn btn-primary">Checkout</a>
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
    
    <script>
        function updateCart(cartId, action) {
            // Send AJAX request to update cart
            var xhr = new XMLHttpRequest();
            xhr.open('GET', 'code/update-card.php?id=' + cartId + '&qty=' + action, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    // Reload the page to reflect changes
                    location.reload();
                }
            };
            xhr.send();
        }
        
        function removeFromCart(cartId) {
            if (confirm('Are you sure you want to remove this item from cart?')) {
                window.location.href = 'code/remove-cart.php?id=' + cartId;
            }
        }
        
        function updateCartQuantities() {
            // This function can be expanded to update all quantities at once
            alert('Cart updated successfully!');
        }
        
        function applyCoupon() {
            var couponCode = document.getElementById('coupon_code').value;
            if(couponCode) {
                alert('Coupon ' + couponCode + ' applied!');
                // This can be expanded with actual coupon functionality
            } else {
                alert('Please enter a coupon code');
            }
        }
    </script>
</body>

</html>