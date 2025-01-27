<?php 
session_start();
include "login_check.php";
include "../admin/code/connection.php";
if(isset($_GET["id"]) && !empty($_GET["id"])){
    $id=$_GET["id"];
    $qty=$_GET['qty'];
    $cart=mysqli_query($con,"SELECT * FROM `cart` WHERE id='$id'");
    $row=mysqli_fetch_array($cart);
    if($qty=='plus'){
        $sql="UPDATE `cart` SET `quantity`=(quantity+1) WHERE id='$id'"; 
    }
    else{
        if($row["quantity"]>1){
        $sql="UPDATE `cart` SET `quantity`=(quantity-1) WHERE id='$id'"; 
        }else{
    $sql="DELETE FROM `cart` WHERE `id`='$id'";


        }
    }
    $query=mysqli_query($con,$sql);
    if(isset($query)){
        header("location:../cart.php?msg=card is upadate.");
    }
    else{
        header("location:../cart.php.php?msg1=Cart is not update.");
    
    }
}
?>