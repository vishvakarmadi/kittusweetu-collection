<?php 
session_start();
$user_id=$_SESSION["user_id"];
include "../admin/code/connection.php";
$sql="SELECT * FROM `user` WHERE `id`=$user_id";
$result=mysqli_query($con,$sql);
$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
// print_r(value: $data);

$sataus=false;
if(isset($_POST["current_password"] )&& !empty($_POST["current_password"])){
   $carrent_pass=$_POST["current_password"]; 
   if($carrent_pass==$data["password"]){
    $carrent_pass=$_POST["current_password"]; 
   }
   else{
    $sataus=true;
    $_SESSION["Error_current_password"]="Current Password is wrong.";
   }
}
else{
    $sataus=true;
    $_SESSION["Error_current_password"]="please fill tha Current Password.";
}
if(isset($_POST["New_Password"] )&& !empty($_POST["New_Password"])){
   $New_Password=$_POST["New_Password"]; 
}
else{
    $sataus=true;
    $_SESSION["Error_New_Password"]="please fill tha New Password.";
}
if(isset($_POST["Confirm_Password"] )&& !empty($_POST["Confirm_Password"])){
   $Confirm_Password=$_POST["Confirm_Password"]; 
   if($Confirm_Password==$New_Password){
   $Confirm_Password=$_POST["Confirm_Password"];
   }
   else{
    $sataus=true;
    $_SESSION["Error_Confirm_Password"]="Confirm_Password is not matched.";
   }
}
else{
    $sataus=true;
    $_SESSION["Error_Confirm_Password"]="please fill tha Confirm_Password.";
}
if($sataus==true){
    header("location:../my-account.php?msg=Please fill the input crrectaly.");
    exit();
}
$sql1="UPDATE `user` SET `password`='$Confirm_Password' WHERE `id`=$user_id";
if(mysqli_query($con,$sql)){
    header("location:../my-account.php?msg1=Password change sucessful.");

}
else{
    header("location:../my-account.php?msg=Password not changed change .");
}
?>
