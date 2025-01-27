<?php 
include("connection.php");
session_start();
$status=false;
if(isset($_POST["name"]) && !empty($_POST["name"])){
   $name= $_POST["name"];
}
else{
    $_SESSION["error_name"]="Category name is requared.";
    $status=true;
}
if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])){
   $img= $_FILES["image"]["name"];
   $img=time().rand(1,999).$img;
   $target="../uplode/category/".$img;
   $temp_name=$_FILES["image"]["tmp_name"];
}
else{
    $_SESSION["error_imag_name"]="Image name is requared.";
    $status=true;
}
if($status==true){
    header("location:../add_category.php?msg=invalid");
    exit();
}
if(move_uploaded_file($temp_name,$target)){
    $sql="INSERT INTO `category`( `category_name`, `image_name`) VALUES ('$name','$img')";
    $query=mysqli_query($con,$sql);
    if(isset($query)){
        header("location:../add_category.php?msg=Category add is  sucsessfuly.");
    }
    else{
        header("location:../add_category.php?msg=Category add is not insert.");

    }
}
?>