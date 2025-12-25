<?php
include 'admin/code/connection.php';

// Add new columns to the orders table for payment gateway information
$alter_query = "
ALTER TABLE `orders` 
ADD COLUMN `payment_ref_no` VARCHAR(255) NULL,
ADD COLUMN `auth_code` VARCHAR(255) NULL,
ADD COLUMN `payment_error_code` VARCHAR(255) NULL,
ADD COLUMN `payment_error_message` TEXT NULL
";

if (mysqli_query($con, $alter_query)) {
    echo "Orders table updated successfully with payment gateway fields.";
} else {
    echo "Error updating orders table: " . mysqli_error($con);
}

mysqli_close($con);
?>