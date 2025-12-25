<?php
include 'admin/code/connection.php';
$result = mysqli_query($con, 'SHOW TABLES');
echo "Database Tables:\n";
while($row = mysqli_fetch_row($result)) {
    echo $row[0]."\n";
}
?>