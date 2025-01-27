<?php
include("connection.php");
$id=$_GET['id'];
$sql="DELETE FROM `sub_category` WHERE `id`='$id'";
$query=mysqli_query($con,$sql);
if(isset($query)){
    header("location:../sub-category-manage.php?msg=Category  is  delete  sucsessfuly.");
}
else{
    header("location:../sub-category-manage.php?msg=Category is not delete.");

}

?>