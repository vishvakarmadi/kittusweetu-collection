<?php
include("connection.php");
$id=$_GET['id'];

session_start();

$sql="DELETE FROM `slider` WHERE `id`='$id'";
$query=mysqli_query($con,$sql);
if(isset($query)){
    header("location:../slider-manage.php?msg=Slider  is  delete  sucsessfuly.");
}
else{
    header("location:../slider-manage.php?msg=Slider is not delete.");

}
?>