<?php
include("connection.php");
$id=$_GET['id'];

session_start();
$sql="DELETE FROM `brand` WHERE `id`='$id'";
$query=mysqli_query($con,$sql);
if(isset($query)){
    header("location:../brand-manage.php?msg=Category  is  delete  sucsessfuly.");
}
else{
    header("location:../brand-manage.php?msg=Category is not delete.");

}
?>