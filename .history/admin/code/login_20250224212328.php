<?php
include("connection.php");
session_start();

$_SESSION["login_status"] = false;
$status = false;

if (isset($_POST["check"]) && !empty($_POST["check"])) {
    $_SESSION["check"] = true;
} else {
    $_SESSION["check_error"] = "Check is required.";
    $_SESSION["check"] = false;
    $status = true;
}

if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $_SESSION["error_email"] = "Email is required.";
    $status = true;
}

if (isset($_POST["password"]) && !empty($_POST["password"])) {
    $pass = $_POST["password"];
} else {
    $_SESSION["error_password"] = "Password is required.";
    $status = true;
}

if ($status == true) {
    header("location:../index.php?msg=invalid");
    exit();
}

$query = mysqli_query($con, "SELECT * FROM `admin` WHERE `email`='$email'");
if ($query) {
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ($email == $data['email'] && $pass == $data['password']) {
            $_SESSION["email"] = $email;
            $_SESSION["password"] = $pass;
            $_SESSION["login_status"] = true;
            header("location:../dashboard.php?msg=Welcome");
        } else {
            header("location:../index.php?msg=invalid_credentials");
        }
    } else {
        header("location:../index.php?msg=email_not_found");
    }
} else {
    header("location:../index.php?msg=database_error");
}
