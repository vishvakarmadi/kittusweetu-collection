<?php 
include "../admin/code/connection.php";
session_start(); 
$sataus = false;

// Validate first name
if (isset($_POST["first_name"]) && !empty($_POST["first_name"])) {
    $first_name = $_POST["first_name"];
} else {
    $_SESSION['Error_first_name'] = 'Please fill the First Name.';
    $sataus = true;
}

// Validate last name
if (isset($_POST["last_name"]) && !empty($_POST["last_name"])) {
    $last_name = $_POST["last_name"];
} else {
    $_SESSION['Error_last_name'] = 'Please fill the Last Name.';
    $sataus = true;
}

// Validate email
if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $_SESSION['Error_email'] = 'Please fill the E-mail.';
    $sataus = true;
}

// Validate password
if (isset($_POST["password"]) && !empty($_POST["password"])) {
    $password = $_POST["password"];
} else {
    $_SESSION['Error_password'] = 'Please fill the password.';
    $sataus = true;
}

// Validate confirm password
if (isset($_POST["comferm_password"]) && !empty($_POST["comferm_password"])) {
    $coforme = $_POST["comferm_password"];
    if ($password !== $coforme) {
        $_SESSION['Error_comferm_password'] = 'Passwords do not match.';
        $sataus = true;
    }else{
        $coforme = $_POST["comferm_password"];
    }
} else {
    $_SESSION['Error_comferm_password'] = 'Please fill the confirm password.';
    $sataus = true;
}

// Check if passwords match


// Validate mobile number
if (isset($_POST["mo_no"]) && !empty($_POST["mo_no"])) {
    $mo_no = $_POST["mo_no"];
} else {
    $_SESSION['Error_mo_no'] = 'Please fill the Mobile Number.';
    $sataus = true;
}

// If any validation failed, redirect back
if ($sataus == true) {
    header("location:../Resitaion.php?msg=Please fill all inputs");
    exit();
}

// Check if email already exists
$email_check_query = "SELECT * FROM `user` WHERE `email` = '$email'";
$email_check_result = mysqli_query($con, $email_check_query);

if (mysqli_num_rows($email_check_result) > 0) {
    $_SESSION['Error_email'] = 'Email already exists. Please use a different email.';
    header("location:../Resitaion.php?msg=Email already exists");
    exit();
}

// Check if mobile number already exists
$mobile_check_query = "SELECT * FROM `user` WHERE `mobile` = '$mo_no'";
$mobile_check_result = mysqli_query($con, $mobile_check_query);

if (mysqli_num_rows($mobile_check_result) > 0) {
    $_SESSION['Error_mo_no'] = 'Mobile number already exists. Please use a different number.';
    header("location:../Resitaion.php?msg=Mobile number already exists");
    exit();
}

// If email and mobile are unique, insert into database
$sql = "INSERT INTO `user`(`first_name`, `last_name`, `email`, `mobile`, `password`) 
VALUES ('$first_name','$last_name','$email','$mo_no','$comferm_password')";
$query = mysqli_query($con, $sql);

if ($query) {
    header("location:../Resitaion.php?msg1=Registration successful.");
} else {
    $_SESSION['Error_query'] = 'Database error: ' . mysqli_error($con);
    header("location:../Resitaion.php?msg=Registration not successful.");
}
?>
