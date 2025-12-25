<?php
include 'admin/code/connection.php';

// Create the password_reset table
$sql = "CREATE TABLE IF NOT EXISTS `password_reset` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT NOT NULL,
    `token` VARCHAR(255) NOT NULL,
    `expires_at` INT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (`user_id`) REFERENCES `user`(`id`) ON DELETE CASCADE
)";

if (mysqli_query($con, $sql)) {
    echo "Table 'password_reset' created successfully or already exists.";
} else {
    echo "Error creating table: " . mysqli_error($con);
}

mysqli_close($con);
?>