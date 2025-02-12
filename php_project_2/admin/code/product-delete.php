<?php
include("connection.php");
$id=$_GET['id'];

session_start();
$sql="DELETE FROM `product` WHERE `id`='$id'";
$query=mysqli_query($con,$sql);
if(isset($query)){
    header("location:../mange_product.php?msg=Product  is  delete  sucsessfuly.");
}
else{
    header("location:../mange_product.php?msg=Product is not delete.");

}
?>