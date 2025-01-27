<?php 
session_start();
include "login_check.php";
include "../admin/code/connection.php";
if(isset($_GET["id"]) && !empty($_GET["id"])){
    $id=$_GET["id"];
    $sql="DELETE FROM `cart` WHERE `id`='$id'";
    $query=mysqli_query($con,$sql);
    if(isset($query)){
        header("location:../cart.php?msg=item  is  removed  sucsessfuly.");
    }
    else{
        header("location:../cart.php.php?msg1=item  is  note  sucsessfuly.");
    
    }
}
?>