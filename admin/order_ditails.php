<?php
include "check_login.php";
include "code/connection.php";

if (!isset($_GET['order_id'])) {
    header("location:orders.php");
    exit();
}

$order_id = $_GET['order_id'];

// Get order details with user information
$sql = "SELECT orders.*, user.first_name, user.last_name, user.email, user.mobile 
        FROM `orders` 
        INNER JOIN `user` 
        ON orders.user_id = user.id 
        WHERE orders.id = $order_id";

$query = mysqli_query($con, $sql);
$order_data = mysqli_fetch_array($query, MYSQLI_ASSOC);

if (!$order_data) {
    header("location:orders.php?msg=Order not found");
    exit();
}

// Get order items
$order_items_sql = "SELECT order_details.*, product.product_name, product.product_img, product.selling_price 
                   FROM `order_details` 
                   INNER JOIN `product` 
                   ON order_details.product_id = product.id 
                   WHERE order_details.order_id = $order_id";

$order_items_query = mysqli_query($con, $order_items_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Order Details</title>
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
            
            <!-- Order Details Content Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <!-- Order Summary Card -->
                    <div class="col-12">
                        <div class="bg-light rounded p-4">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <h3 class="mb-0">Order Details #<?php echo $order_data['id']; ?></h3>
                                <span class="badge 
                                    <?php 
                                        if($order_data['status'] == 'pending') echo 'bg-warning';
                                        elseif($order_data['status'] == 'processing') echo 'bg-info';
                                        elseif($order_data['status'] == 'shipped') echo 'bg-primary';
                                        elseif($order_data['status'] == 'delivered') echo 'bg-success';
                                        else echo 'bg-secondary';
                                    ?> fs-5">
                                    <?php echo ucfirst($order_data['status']); ?>
                                </span>
                            </div>
                            
                            <div class="row g-4">
                                <!-- Order Information -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="card-title mb-0">Order Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="mb-1"><strong>Order ID:</strong></p>
                                                    <p class="text-muted mb-3"><?php echo $order_data['id']; ?></p>
                                                    
                                                    <p class="mb-1"><strong>Order Date:</strong></p>
                                                    <p class="text-muted mb-3"><?php echo $order_data['created_at']; ?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-1"><strong>Payment Method:</strong></p>
                                                    <p class="text-muted mb-3"><?php echo $order_data['payment_method']; ?></p>
                                                    
                                                    <p class="mb-1"><strong>Order Status:</strong></p>
                                                    <p>
                                                        <span class="badge 
                                                            <?php 
                                                                if($order_data['status'] == 'pending') echo 'bg-warning';
                                                                elseif($order_data['status'] == 'processing') echo 'bg-info';
                                                                elseif($order_data['status'] == 'shipped') echo 'bg-primary';
                                                                elseif($order_data['status'] == 'delivered') echo 'bg-success';
                                                                else echo 'bg-secondary';
                                                            ?>">
                                                            <?php echo ucfirst($order_data['status']); ?>
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Customer Information -->
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="card-title mb-0">Customer Information</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-6">
                                                    <p class="mb-1"><strong>Name:</strong></p>
                                                    <p class="text-muted mb-3"><?php echo $order_data['first_name'] . ' ' . $order_data['last_name']; ?></p>
                                                    
                                                    <p class="mb-1"><strong>Email:</strong></p>
                                                    <p class="text-muted mb-3"><?php echo $order_data['email']; ?></p>
                                                </div>
                                                <div class="col-6">
                                                    <p class="mb-1"><strong>Mobile:</strong></p>
                                                    <p class="text-muted mb-3"><?php echo $order_data['mobile']; ?></p>
                                                    
                                                    <p class="mb-1"><strong>Total Amount:</strong></p>
                                                    <p class="text-muted mb-3">₹<?php echo number_format($order_data['total'], 2); ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Order Items -->
                            <div class="card mt-4">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title mb-0">Order Items</h5>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover">
                                            <thead class="table-dark">
                                                <tr>
                                                    <th>Product Image</th>
                                                    <th>Product Name</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $total_amount = 0;
                                                while($item = mysqli_fetch_array($order_items_query, MYSQLI_ASSOC)) {
                                                    $item_total = $item['selling_price'] * $item['qty'];
                                                    $total_amount += $item_total;
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img src="uplode/product/<?php echo $item['product_img']; ?>" 
                                                             alt="<?php echo $item['product_name']; ?>" 
                                                             style="width: 60px; height: 60px; object-fit: cover;" class="img-thumbnail">
                                                    </td>
                                                    <td><?php echo $item['product_name']; ?></td>
                                                    <td>₹<?php echo number_format($item['selling_price'], 2); ?></td>
                                                    <td><?php echo $item['qty']; ?></td>
                                                    <td>₹<?php echo number_format($item_total, 2); ?></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Order Summary & Status Update -->
                            <div class="row mt-4">
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="card-title mb-0">Update Order Status</h5>
                                        </div>
                                        <div class="card-body">
                                            <form action="code/update-order-status.php" method="post">
                                                <input type="hidden" name="order_id" value="<?php echo $order_data['id']; ?>">
                                                <div class="mb-3">
                                                    <label class="form-label">Select Status</label>
                                                    <select class="form-select" name="status" required>
                                                        <option value="">Select Status</option>
                                                        <option value="pending" <?php if($order_data['status'] == 'pending') echo 'selected'; ?>>Pending</option>
                                                        <option value="processing" <?php if($order_data['status'] == 'processing') echo 'selected'; ?>>Processing</option>
                                                        <option value="shipped" <?php if($order_data['status'] == 'shipped') echo 'selected'; ?>>Shipped</option>
                                                        <option value="delivered" <?php if($order_data['status'] == 'delivered') echo 'selected'; ?>>Delivered</option>
                                                        <option value="cancelled" <?php if($order_data['status'] == 'cancelled') echo 'selected'; ?>>Cancelled</option>
                                                    </select>
                                                </div>
                                                <button type="submit" class="btn btn-primary w-100">Update Status</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-header bg-primary text-white">
                                            <h5 class="card-title mb-0">Order Summary</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Sub Total:</span>
                                                <strong>₹<?php echo number_format($order_data['sub_total'], 2); ?></strong>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Shipping Charge:</span>
                                                <strong>₹<?php echo number_format($order_data['shipping_charg'], 2); ?></strong>
                                            </div>
                                            <div class="d-flex justify-content-between mb-2">
                                                <span>Tax (if any):</span>
                                                <strong>₹0.00</strong>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between mb-0">
                                                <span><strong>Total:</strong></span>
                                                <strong class="fs-5">₹<?php echo number_format($order_data['total'], 2); ?></strong>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Order Details Content End -->
            
            <!-- Footer Start -->
            <?php //include "footer.php" ?>
            <!-- Footer End -->
        </div>
        <!-- Content End -->
        
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
    
    <?php include "jslink.php" ?>
</body>
</html>