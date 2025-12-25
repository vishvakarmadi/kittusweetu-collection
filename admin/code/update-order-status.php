<?php
include "role_check.php";
include "connection.php";

// Check if user is logged in and has proper access
if (!isset($_SESSION["login_satus"]) || $_SESSION["login_satus"] != true) {
    header("location:../index.php");
    exit();
}

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['order_id']) && isset($_POST['status'])) {
        $order_id = $_POST['order_id'];
        $status = $_POST['status'];
        
        // Validate status
        $valid_statuses = ['pending', 'processing', 'shipped', 'delivered', 'cancelled'];
        if (!in_array($status, $valid_statuses)) {
            header("location:../order_ditails.php?order_id=$order_id&msg=Invalid status");
            exit();
        }
        
        // Update order status
        $sql = "UPDATE `orders` SET `status`='$status' WHERE `id`=$order_id";
        $result = mysqli_query($con, $sql);
        
        if ($result) {
            header("location:../order_ditails.php?order_id=$order_id&msg=Status updated successfully");
        } else {
            header("location:../order_ditails.php?order_id=$order_id&msg=Error updating status");
        }
    } else {
        header("location:../orders.php?msg=Invalid request");
    }
} else {
    header("location:../orders.php?msg=Invalid request method");
}
?>