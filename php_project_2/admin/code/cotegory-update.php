<?php 
include("connection.php");
session_start();

$date=date("y-m-d H:m:S");
$sataus=false;
$id=$_POST["id"];
if(isset($_POST["name"]) && !empty($_POST["name"]))
{
  $name=$_POST["name"];
  echo $name;
}
else{
    $_SESSION["update name error"]="Name is required";
    $sataus=true;
}
if(isset($_POST["sataus"]) && !empty($_POST["sataus"]))
{
  $satau_s=$_POST["sataus"];
}
if(isset($_FILES["image"]) && !empty($_FILES["image"]["name"])){
$img_name=$_FILES["image"]["name"];
$img_name=time().rand(1,999).$img_name;
$target="../uplode/category/$img_name";
$temp_name=$_FILES["image"]["tmp_name"];

$uplode=move_uploaded_file($temp_name,$target);
if(isset($uplode)){
  $sql="UPDATE `category` SET `category_name`='$name',`image_name`='$img_name',`status`='$satau_s',`updated_time`='$date' WHERE `id`='$id'";
  
}


}
else{
  $sql="UPDATE `category` SET `category_name`='$name',`status`='$satau_s',`updated_time`='$date' WHERE `id`='$id'";
  echo "hello";
}
$qurey=mysqli_query($con,$sql);
if(isset($sql)){
  header("location:../mange_category.php?msg=Category is update sucsessfully.");
}
else{
  header("location:../mange_category.php?msg=Category is update sucsessfully.");

}
?>