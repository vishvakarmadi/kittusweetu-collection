<?php 
session_start();
include "../admin/code/connection.php";
include "login_check.php";

// Directly using input values (Not recommended)
$id = $_GET['id'];
$user_id = $_SESSION["user_id"];
$prduct=mysqli_query($con,"select * from product where id='$id'");
if(mysqli_num_rows($prduct)>0){
    $row=mysqli_fetch_array($prduct);
    // print_r($row);
    if($row["quantity"]>0){
        $cart=mysqli_query($con,"SELECT * FROM `cart` WHERE product_id='$id' and `status`=1");
        if(mysqli_num_rows($cart)>0){
         $sql="UPDATE `cart` SET `quantity`=(quantity+1) WHERE product_id='$id'";   

        }
        else{
           $sql = "INSERT INTO `cart` (`user_id`, `product_id`) VALUES ('$user_id', '$id')";
        }
// Execute query
if (mysqli_query($con, $sql)) {
    // Redirect to cart page if successful
    header("Location: ../cart.php");
//    echo 'hello';
    exit;
} else {
    // Display error message if query fails
    echo "Error: ". mysqli_error($con);
}
    }else{
        header("location:../cart.php?msg=out of stock");
    }
}

else{
    header("location:../cart.php?msg=invalid product");
}
?>
