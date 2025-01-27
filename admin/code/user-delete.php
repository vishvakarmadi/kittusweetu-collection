<?php
include("connection.php");
$id=$_GET['id'];

session_start();
$sql="DELETE FROM `user` WHERE `id`='$id'";
$query=mysqli_query($con,$sql);
if(isset($query)){
    header("location:../user_ditail.php?msg=User  is  delete  sucsessfuly.");
}
else{
    header("location:../user_ditail.php?msg=user is not delete.");

}
?>