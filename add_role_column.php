<?php
include 'admin/code/connection.php';

// Add role column to user table
$sql = "ALTER TABLE user ADD COLUMN role VARCHAR(50) DEFAULT 'customer'";
if (mysqli_query($con, $sql)) {
    echo "Role column added successfully\n";
} else {
    echo "Error adding role column: " . mysqli_error($con) . "\n";
}

// Check if the column exists
$result = mysqli_query($con, "SHOW COLUMNS FROM user LIKE 'role'");
if (mysqli_num_rows($result) > 0) {
    echo "Role column exists in user table\n";
} else {
    echo "Role column does not exist in user table\n";
}
?>