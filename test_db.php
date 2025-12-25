<?php
include 'admin/code/connection.php';

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

echo "Connected successfully\n";

// Check if tables exist
$tables = ['product', 'category', 'slider', 'brand', 'user'];
foreach ($tables as $table) {
    $result = mysqli_query($con, "SHOW TABLES LIKE '$table'");
    if (mysqli_num_rows($result) > 0) {
        echo "Table '$table' exists\n";
    } else {
        echo "Table '$table' does not exist\n";
    }
}

mysqli_close($con);
?>