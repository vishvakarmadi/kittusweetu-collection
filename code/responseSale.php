<?php
include_once "../config/icici_utility.php";
include "../admin/code/connection.php";

// Process the response from ICICI payment gateway
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate the response
    if (IciciPayment::validateResponse($_POST)) {
        // Process the response
        $txn_id = isset($_POST['TXNID']) ? $_POST['TXNID'] : '';
        $status = isset($_POST['TXNSTATUS']) ? $_POST['TXNSTATUS'] : '';
        $amount = isset($_POST['TXNAMOUNT']) ? $_POST['TXNAMOUNT'] : '';
        $ref_no = isset($_POST['REFNO']) ? $_POST['REFNO'] : '';
        $auth_code = isset($_POST['AUTHCODE']) ? $_POST['AUTHCODE'] : '';
        $error_code = isset($_POST['ERROR_CODE']) ? $_POST['ERROR_CODE'] : '';
        $error_message = isset($_POST['ERROR_MESSAGE']) ? $_POST['ERROR_MESSAGE'] : '';
        
        // Update order status in database based on payment status
        if (!empty($txn_id)) {
            if ($status == 'SUCCESS') {
                // Update order status to 'paid' or 'confirmed'
                $update_sql = "UPDATE `orders` SET `status` = 'confirmed', `payment_ref_no` = '$ref_no', `auth_code` = '$auth_code' WHERE `id` = '$txn_id'";
                if (mysqli_query($con, $update_sql)) {
                    // Redirect to success page
                    header("Location: ../thank.php?msg=Payment Successful&order_id=$txn_id");
                    exit;
                } else {
                    // Error updating order
                    header("Location: ../thank.php?msg=Error updating order status");
                    exit;
                }
            } else {
                // Payment failed, update order status to 'cancelled' or 'failed'
                $update_sql = "UPDATE `orders` SET `status` = 'failed', `payment_error_code` = '$error_code', `payment_error_message` = '$error_message' WHERE `id` = '$txn_id'";
                if (mysqli_query($con, $update_sql)) {
                    // Redirect to failure page
                    header("Location: ../thank.php?msg=Payment Failed&error=$error_message");
                    exit;
                } else {
                    // Error updating order
                    header("Location: ../thank.php?msg=Error updating order status");
                    exit;
                }
            }
        } else {
            // Invalid transaction ID
            header("Location: ../thank.php?msg=Invalid transaction details");
            exit;
        }
    } else {
        // Invalid checksum - potential security issue
        header("Location: ../thank.php?msg=Invalid response from payment gateway");
        exit;
    }
} else {
    // Not a POST request
    header("Location: ../index.php");
    exit;
}
?>