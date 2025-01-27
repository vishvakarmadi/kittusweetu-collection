<?php 
session_start();
include "../admin/code/connection.php";
$user_id=$_SESSION["user_id"];
$sataus=false;
if(isset($_POST["first_name"] )&& !empty($_POST["first_name"])){
   $first_name=$_POST["first_name"]; 
}
else{
    $sataus=true;
    $_SESSION["Error_first_name"]="Please fill tha first name.";
}
if(isset($_POST["last_name"] )&& !empty($_POST["last_name"])){
   $last_name=$_POST["last_name"]; 
}
else{
    $sataus=true;
    $_SESSION["Error_last_name"]="Please fill tha last name.";
}
if(isset($_POST["address"] )&& !empty($_POST["address"])){
    $address=$_POST["address"];
   
}
else{
    $sataus=true;
    $_SESSION["Error_address"]="please fill tha address.";
}
if($sataus==true){
    header("location:../my-account.php?msg=Please fill the input crrectaly.");
    exit();
}
$sql1="UPDATE `user` SET `first_name`='$first_name',`last_name`='$last_name',`address`='$address'WHERE `id`='$user_id'";
if(mysqli_query($con,$sql1)){
    header("location:../my-account.php?msg1=Profile Update sucessful.");

}
else{
    header("location:../my-account.php?msg=Profile not update.");
}
?>
