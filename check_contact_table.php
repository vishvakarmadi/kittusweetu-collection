<?php
include 'admin/code/connection.php';
$result = mysqli_query($con, 'DESCRIBE contact_us');
echo "Contact Table Structure:\n";
while($row = mysqli_fetch_assoc($result)) {
    print_r($row);
}
?>