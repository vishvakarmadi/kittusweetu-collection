<?php
include("connection.php");
session_start();

$status = false;

if (empty($_POST["check"])) {
    $_SESSION["check_error"] = "Check is required.";
    $status = true;
} else {
    $_SESSION["check"] = true;
}

if (empty($_POST["email"])) {
    $_SESSION["error_email"] = "Email is required.";
    $status = true;
} else {
    $email = $_POST["email"];
}

if (empty($_POST["password"])) {
    $_SESSION["error_password"] = "Password is required.";
    $status = true;
} else {
    $pass = $_POST["password"];
}

if ($status) {
    header("Location: ../index.php?msg=invalid");
    exit();
}

$stmt = $con->prepare("SELECT * FROM `admin` WHERE `email` = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    if (password_verify($pass, $data["password"])) {
        $_SESSION["email"] = $email;
        $_SESSION["login_status"] = true;
        header("Location: ../dashboard.php?msg=Welcome");
    } else {
        header("Location: ../index.php?msg=Invalid credentials");
    }
} else {
    header("Location: ../index.php?msg=Email not found");
}
