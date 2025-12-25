<?php 
session_start();
$user_id=$_SESSION["user_id"];
include "../admin/code/connection.php";

// Use prepared statement to fetch user data
$sql = "SELECT * FROM `user` WHERE `id` = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($result, MYSQLI_ASSOC);

$sataus=false;

if(isset($_POST["current_password"] )&& !empty($_POST["current_password"])){
   $current_pass = $_POST["current_password"]; 
   
   // Check if stored password is hashed or plain text
   $is_hashed = (substr($data["password"], 0, 4) === '$2y$' || 
                 substr($data["password"], 0, 4) === '$2x$' || 
                 substr($data["password"], 0, 4) === '$2a$');
   
   if($is_hashed) {
       // Use password_verify for hashed passwords
       if(password_verify($current_pass, $data["password"])) {
           $carrent_pass = $current_pass;
       } else {
           $sataus=true;
           $_SESSION["Error_current_password"]="Current Password is wrong.";
       }
   } else {
       // Compare plain text for legacy passwords
       if($current_pass === $data["password"]) {
           $carrent_pass = $current_pass;
       } else {
           $sataus=true;
           $_SESSION["Error_current_password"]="Current Password is wrong.";
       }
   }
}
else{
    $sataus=true;
    $_SESSION["Error_current_password"]="please fill tha Current Password.";
}

if(isset($_POST["New_Password"] )&& !empty($_POST["New_Password"])){
   $New_Password = $_POST["New_Password"]; 
}
else{
    $sataus=true;
    $_SESSION["Error_New_Password"]="please fill tha New Password.";
}

if(isset($_POST["Confirm_Password"] )&& !empty($_POST["Confirm_Password"])){
   $Confirm_Password = $_POST["Confirm_Password"]; 
   if($Confirm_Password == $New_Password){
       $Confirm_Password = $_POST["Confirm_Password"];
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

// Hash the new password before storing
$hashed_new_password = password_hash($Confirm_Password, PASSWORD_DEFAULT);

// Use prepared statement to update password
$update_sql = "UPDATE `user` SET `password` = ? WHERE `id` = ?";
$update_stmt = mysqli_prepare($con, $update_sql);
mysqli_stmt_bind_param($update_stmt, "si", $hashed_new_password, $user_id);

if(mysqli_stmt_execute($update_stmt)){
    header("location:../my-account.php?msg1=Password change sucessful.");
} else {
    header("location:../my-account.php?msg=Password not changed change .");
}
?>