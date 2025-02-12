<?php
session_start(); 
$sataus=false;
print_r($_POST);
if(isset($_POST["email"]) && !empty($_POST["email"])){
    $email= $_POST["email"];
}
else{
$_SESSION['Error_email']='Please fill the username or E-mail.';
$sataus=true;
}
if(isset($_POST["password"]) && !empty($_POST["password"])){
    $password= $_POST["password"];
}
else{
$_SESSION['Error_password']='Please fill the password.';
$sataus=true;
}
if(isset($_POST["check"]) && !empty($_POST["check"])){
    $check= $_POST["check"];
}
else{
$_SESSION['Error_check']='Please click the check.';
$sataus=true;
}
if($sataus==true){
    header("location:../login.php?msg=please Fill the all Inputs");
    exit();
}
?>