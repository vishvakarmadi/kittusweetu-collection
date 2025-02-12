<?php 
session_start();
include("connection.php");
$id=$_POST["id"];
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
if($error==true){
    header("location:../sub-category-add.php?mag=invaid");
    exit();
}
if(isset($_FILES['image']) && !empty($_FILES['image']['name'])){
$img_name=$_FILES['image']['name'];
$img_name=rand(1,999).time().$img_name;
$target="../uplode/sub_category/$img_name";
$temp_name=$_FILES['image']['tmp_name'];
$uplode = move_uploaded_file($temp_name,$target);
if(isset($uplode)){
 $sql="UPDATE `sub_category` SET `sub_name`='$sub',`category_id`='$Category',`sub_image`='$img_name',`status`='$status' WHERE `id`='$id'";
 $insert= mysqli_query($con,$sql);
 if(isset($insert)){
    header("location:../sub-category-manage.php?msg=update is Add sucsessfull");
 }
else{
    header("location:../sub-category-add.php?msg=update is not Add");

}
}
}
else{
    $sql="UPDATE `sub_category` SET `sub_name`='$sub',`category_id`='$Category',`status`='$status' WHERE `id`='$id'";
 $insert= mysqli_query($con,$sql);
 if(isset($insert)){
    header("location:../sub-category-manage.php?msg=update is Add sucsessfull");
 }
else{
    header("location:../sub-category-add.php?msg=update is not Add");

}
}


?>