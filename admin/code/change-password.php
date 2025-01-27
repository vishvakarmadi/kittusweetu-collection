<?php 
session_start();
include("connection.php");
$email=$_SESSION["email"];
$sql1="SELECT * FROM `admin` WHERE `email`='$email'";
$res=mysqli_query($con,$sql1);
$data=mysqli_fetch_array($res,MYSQLI_ASSOC);
$pass=$data["password"];

$sataus=false;

if(isset($_POST["old_pass"]) && !empty($_POST["old_pass"])){
    $old_pass=$_POST["old_pass"];
}
else{
    $_SESSION["old password error"]="old password is requared.";
    $sataus=true;
}
if(isset($_POST["new_pass"]) && !empty($_POST["new_pass"])){
    $new_pass=$_POST["new_pass"];
}
else{
    $_SESSION["new password error"]="New password is requared.";
    $sataus=true;
}
if(isset($_POST["com_pass"]) && !empty($_POST["com_pass"])){
    $com_pass=$_POST["com_pass"];
}
else{
    $_SESSION["comfirm password error"]="Comfirm password is requared.";
    $sataus=true;
}
if($sataus==true){
    header("location:../change-password.php?msg=IVALID");
    exit();
}
if($pass==$old_pass){
    if($new_pass==$com_pass){
        $sql="UPDATE `admin` SET`password`='$new_pass' WHERE `email`='$email'";
        $upadete=mysqli_query($con,$sql);
        if(isset($upadete)){
            header("location:../change-password.php?change=Password changed sucessful.");
        }
        else{
        header("location:../change-password.php?change=Password is not changed .");
        }
    }
    else{
        header("location:../change-password.php?pass=Comfirm password is not matched");   
    }
}
else{
    header("location:../change-password.php?old=Old password is wrong");
    
}

?>