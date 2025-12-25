<?php 
session_start();
include("./connection.php");
$email=$_SESSION["email"];

// Use prepared statement to fetch admin data
$sql = "SELECT * FROM `admin` WHERE `email` = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_array($result, MYSQLI_ASSOC);
$stored_pass = $data["password"];

$sataus=false;

if(isset($_POST["old_pass"]) && !empty($_POST["old_pass"])){
    $old_pass = $_POST["old_pass"];
}
else{
    $_SESSION["old password error"]="old password is requared.";
    $sataus=true;
}
if(isset($_POST["new_pass"]) && !empty($_POST["new_pass"])){
    $new_pass = $_POST["new_pass"];
}
else{
    $_SESSION["new password error"]="New password is requared.";
    $sataus=true;
}
if(isset($_POST["com_pass"]) && !empty($_POST["com_pass"])){
    $com_pass = $_POST["com_pass"];
}
else{
    $_SESSION["comfirm password error"]="Comfirm password is requared.";
    $sataus=true;
}
if($sataus==true){
    header("location:../change-password.php?msg=IVALID");
    exit();
}

// Check if stored password is hashed or plain text
$is_hashed = (substr($stored_pass, 0, 4) === '$2y$' || 
              substr($stored_pass, 0, 4) === '$2x$' || 
              substr($stored_pass, 0, 4) === '$2a$');

if($is_hashed) {
    // Use password_verify for hashed passwords
    $old_password_match = password_verify($old_pass, $stored_pass);
} else {
    // Compare plain text for legacy passwords
    $old_password_match = ($old_pass === $stored_pass);
}

if($old_password_match){
    if($new_pass == $com_pass){
        // Hash the new password before storing
        $hashed_new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
        
        // Use prepared statement to update password
        $update_sql = "UPDATE `admin` SET `password` = ? WHERE `email` = ?";
        $update_stmt = mysqli_prepare($con, $update_sql);
        mysqli_stmt_bind_param($update_stmt, "ss", $hashed_new_pass, $email);
        
        $upadete = mysqli_stmt_execute($update_stmt);
        if($upadete){
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