<?php 
include "../admin/code/connection.php";
session_start(); 

// Flag for validation status
$status = false;

// Validate email
if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = mysqli_real_escape_string($con, trim($_POST["email"]));
} else {
    $_SESSION['Error_email'] = 'Please fill in the email.';
    $status = true;
}

// Validate password
if (isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = trim($_POST["password"]);
} else {
    $_SESSION['Error_password'] = 'Please fill in the password.';
    $status = true;
}

// If any validation failed, redirect back
if ($status) {
    header("location:../login.php?msg=Please fill all inputs");
    exit();
}

// Fetch user record
$query = "SELECT * FROM `user` WHERE `mobile` = '$email' OR `email` = '$email'";
$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    // Verify password (assuming stored passwords are hashed)
    if ($password==$user["password"]) {
        // Set session variables
        $_SESSION['user_id'] = $user["id"];
        $_SESSION['name'] = $user["first_name"] . ' ' . $user["last_name"];
        
        // Redirect to dashboard or homepage
        header("location:../index.php?msg=Login successful.");
        exit();
    } else {
        $_SESSION['Error_password'] = 'Incorrect password.';
        header("location:../login.php?msg=Invalid login credentials.");
        exit();
    }
} else {
    $_SESSION['Error_email'] = 'Email not found.';
    header("location:../login.php?msg=Invalid login credentials.");
    exit();
}
?>
