<?php
session_start(); 
include "../admin/code/connection.php";

$sataus=false;

if(isset($_POST["email"]) && !empty($_POST["email"])){
    $email= $_POST["email"];
}
else{
    $_SESSION['Error_email']='Please fill the email.';
    $sataus=true;
}

if(isset($_POST["password"]) && !empty($_POST["password"])){
    $password= $_POST["password"];
}
else{
    $_SESSION['Error_password']='Please fill the password.';
    $sataus=true;
}

// Check is not required for login, so removing that validation

if($sataus==true){
    header("location:../login.php?msg=please Fill the required Inputs");
    exit();
}

// Check user credentials in the database
$sql = "SELECT * FROM `user` WHERE `email` = '$email'";
$result = mysqli_query($con, $sql);

if(mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    if($data['password'] == $password) {
        // Login successful
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['user_email'] = $data['email'];
        $_SESSION['user_name'] = $data['first_name'] . ' ' . $data['last_name'];
        $_SESSION['user_role'] = $data['role']; // Store user role
        
        // Redirect to homepage or previous page
        header("location:../index.php");
    } else {
        // Invalid password
        header("location:../login.php?error=invalid");
    }
} else {
    // User not found
    header("location:../login.php?error=notfound");
}

mysqli_close($con);
?>