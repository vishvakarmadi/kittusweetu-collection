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
$sql = "SELECT * FROM `user` WHERE `email` = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if(mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
    
    // Check if password is hashed (modern format) or plain text (legacy)
    // Modern passwords start with $2y$, $2x$, or $2a$ (bcrypt format)
    $is_hashed = (substr($data['password'], 0, 4) === '$2y$' || 
                  substr($data['password'], 0, 4) === '$2x$' || 
                  substr($data['password'], 0, 4) === '$2a$');
    
    if($is_hashed) {
        // Use password_verify for hashed passwords
        $login_success = password_verify($password, $data['password']);
    } else {
        // Compare plain text for legacy passwords
        $login_success = ($password === $data['password']);
    }
    
    if($login_success) {
        // Login successful
        $_SESSION['user_id'] = $data['id'];
        $_SESSION['user_email'] = $data['email'];
        $_SESSION['user_name'] = $data['first_name'] . ' ' . $data['last_name'];
        $_SESSION['user_role'] = $data['role']; // Store user role
        
        // Redirect to homepage or previous page
        header("location:../index.php");
        exit();
    } else {
        // Invalid password
        header("location:../login.php?error=invalid");
        exit();
    }
} else {
    // User not found
    header("location:../login.php?error=notfound");
    exit();
}

mysqli_close($con);
?>