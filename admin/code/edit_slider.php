<?php
include("connection.php");
session_start();
$status = false;
$id=$_POST["id"];
if (isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])) {
    $img = $_FILES["image"]["name"];
    $img = time() . rand(1, 999) . $img;
    $target = "../uplode/slider/" . $img;
    $temp_name = $_FILES["image"]["tmp_name"];
    move_uploaded_file($temp_name, $target);
    $sql = "UPDATE `slider` SET `image_name`='$img' WHERE `id`='$id'";
    $qurey=mysqli_query($con,$sql);
    header("location:../slider-manage.php?msg=Slider update is  sucsessfuly.");

} else {
    header("location:../slider-manage.php?msg=Slider update is  sucsessfuly.");   
}

