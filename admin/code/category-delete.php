<?php
include("connection.php");
$id=$_GET['id'];

session_start();
$sql="DELETE FROM `category` WHERE `id`='$id'";
$query=mysqli_query($con,$sql);
if(isset($query)){
    header("location:../mange_category.php?msg=Category  is  delete  sucsessfuly.");
}
else{
    header("location:../mange_category.php?msg=Category is not delete.");

}
?>