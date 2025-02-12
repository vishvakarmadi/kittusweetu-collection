<?php
session_start();
include "../admin/code/connection.php";
$sataus=false; 
print_r($_POST);
if(isset($_POST["name"]) && !empty($_POST["name"])){
    $name=$_POST["name"];
}
else{
    $_SESSION["Error_name"]= "name is required.";
    $sataus=true;
}
if(isset($_POST["email"]) && !empty($_POST["email"])){
    $email=$_POST["email"];
}
else{
    $_SESSION["Error_email"]= "email is required.";
    $sataus=true;
}
if(isset($_POST["subject"]) && !empty($_POST["subject"])){
    $subject=$_POST["subject"];
}
else{
    $_SESSION["Error_subject"]= "subject is required.";
    $sataus=true;
}
if(isset($_POST["massage"]) && !empty($_POST["massage"])){
    $massage=$_POST["massage"];
}
else{
    $_SESSION["Error_massage"]= "Massage is required.";
    $sataus=true;
}
if($sataus==true){
    header("location:../contact.php?msg=Fill the all inputs.");
    exit();
}
$sql="INSERT INTO `contact_us`(`name`, `subject`, `email`, `message`) VALUES ('$name','$subject','$email','$massage')";

?>