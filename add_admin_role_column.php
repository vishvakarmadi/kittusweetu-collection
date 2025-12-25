<?php
include 'admin/code/connection.php';

// Add role column to admin table
$sql = "ALTER TABLE admin ADD COLUMN role VARCHAR(50) DEFAULT 'admin'";
if (mysqli_query($con, $sql)) {
    echo "Role column added successfully to admin table\n";
} else {
    echo "Error adding role column: " . mysqli_error($con) . "\n";
}

// Check if the column exists
$result = mysqli_query($con, "SHOW COLUMNS FROM admin LIKE 'role'");
if (mysqli_num_rows($result) > 0) {
    echo "Role column exists in admin table\n";
} else {
    echo "Role column does not exist in admin table\n";
}
?>