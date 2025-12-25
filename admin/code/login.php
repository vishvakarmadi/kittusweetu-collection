<?php
include("connection.php");
session_start();
// print_r($_POST);
$_SESSION["login_satus"]=false;
$status = false;
if (isset($_POST["check"]) && !empty($_POST["check"])) {
    $check = $_POST["check"];
    $_SESSION["check"]=true;
} else {
    $_SESSION["check_error"] = "check is requared.";
    $_SESSION["check"]==false;
    $status = true;
}
if (isset($_POST["email"]) && !empty($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $_SESSION["error email"] = "email is requared.";
    $status = true;
}

if (isset($_POST["password"]) && !empty($_POST["password"])) {
    $pass = $_POST["password"];
} else {
    $_SESSION["error password"] = "Password is requared.";
    $status = true;
}
if ($status == true) {
    header("location:../index.php?msg=invalide");
    exit();
}

// Use prepared statement to prevent SQL injection
$stmt = mysqli_prepare($con, "SELECT * FROM `admin` WHERE `email` = ?");
mysqli_stmt_bind_param($stmt, "s", $email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if (isset($result)) {
    if (mysqli_num_rows($result) > 0) {
        $data = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        // Check if password is hashed (modern format) or plain text (legacy)
        // Modern passwords start with $2y$, $2x$, or $2a$ (bcrypt format)
        $is_hashed = (substr($data['password'], 0, 4) === '$2y$' || 
                      substr($data['password'], 0, 4) === '$2x$' || 
                      substr($data['password'], 0, 4) === '$2a$');
        
        if($is_hashed) {
            // Use password_verify for hashed passwords
            $login_success = password_verify($pass, $data["password"]);
        } else {
            // Compare plain text for legacy passwords
            $login_success = ($pass === $data["password"]);
        }
        
        if ($login_success) {
           $_SESSION["email"]=$email;
           $_SESSION["passwword"]=$pass;
           $_SESSION['admin_role'] = $data['role']; // Store admin role
        //    print_r($_SESSION);
        $_SESSION["login_satus"]=true;
           header("location:../dashbord.php?msg=Wellcome");
        } else {
            header("location:../index.php?msg=invalide");
        }
    } else {
    header("location:../index.php?msg=mail is vlid");
    }
} else {
    header("location:../index.php?msg=mail is vlid");
}