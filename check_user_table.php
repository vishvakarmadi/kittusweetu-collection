<?php
include 'admin/code/connection.php';

$result = mysqli_query($con, 'SHOW COLUMNS FROM user');
echo "User table structure:\n";
echo str_pad("Field", 20) . str_pad("Type", 20) . str_pad("Null", 10) . str_pad("Key", 10) . str_pad("Default", 15) . "Extra\n";
echo str_repeat("-", 80) . "\n";

while($row = mysqli_fetch_assoc($result)) {
    echo str_pad($row['Field'], 20) . str_pad($row['Type'], 20) . str_pad($row['Null'], 10) . str_pad($row['Key'], 10) . str_pad($row['Default'] !== null ? $row['Default'] : 'NULL', 15) . $row['Extra'] . "\n";
}
?>