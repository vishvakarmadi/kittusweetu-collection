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
$query = mysqli_query($con, "SELECT * FROM `admin` Where `email`='$email'");
if (isset($query)) {
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query, MYSQLI_ASSOC);
        if ($email == $data['email'] && $pass == $data["password"]) {
           $_SESSION["email"]=$email;
           $_SESSION["passwword"]=$pass;
        //    print_r($_SESSION);
        $_SESSION["login_satus"]=true;
           header("location:../index.php?msg=Wellcome");
        } else {
            header("location:../index.php?msg=invalide");
            echo "hello";
        }
    }
} else {
    header("location:../index.php?msg=mail is vlid");
}
