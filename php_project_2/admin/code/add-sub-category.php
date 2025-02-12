<?php 
session_start();
include("connection.php");
$error=false;
if(isset($_POST['sub']) && !empty($_POST['sub'])){
    $sub=$_POST['sub'];
}
else{
    $_SESSION["Error sub"]="Sub-Category is required.";
    $error=true;
}
if(isset($_POST['Category']) && !empty($_POST['Category'])){
    $Category=$_POST['Category'];
}
else{
    $_SESSION["Error Category"]="Category is required.";
    $error=true;
}
if(isset($_POST['status']) && !empty($_POST['status'])){
    $status=$_POST['status'];
}
else{
    $_SESSION["Errorstatus"]="Status is required.";
    $error=true;
}
if(isset($_FILES['image']) && !empty($_FILES['image'])){
$img_name=$_FILES['image']['name'];
$img_name=rand(1,999).time().$img_name;
$target="../uplode/sub_category/$img_name";
$temp_name=$_FILES['image']['tmp_name'];
}
else{
    $_SESSION["Error image"]="image is required.";
    $error=true;
}
if($error==true){
    header("location:../sub-category-add.php?mag=invaid");
    exit();
}
$uplode = move_uploaded_file($temp_name,$target);
if(isset($uplode)){
 $sql="INSERT INTO `sub_category`(`sub_name`, `category_id`, `sub_image`, `status`) VALUES ('$sub','$Category','$img_name','$status') ";
 $insert= mysqli_query($con,$sql);
 if(isset($insert)){
    header("location:../sub-category-add.php?mag=Data is Add sucsessfull");
 }
else{
    header("location:../sub-category-add.php?mag=Data is not Add");
}
}
?>