<?php 
include("connection.php");
session_start();
$id=$_POST["id"];
$status=false;
if(isset($_POST["name"]) && !empty($_POST["name"])){
   $name= $_POST["name"];
//    echo $name ;
}
else{
    $_SESSION["error_name_brand"]="Brand name is requared.";
    $status=true;
}

if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])){
   $img= $_FILES["image"]["name"];
   $img=time().rand(1,999).$img;
   $target="../uplode/brand/".$img;
   $temp_name=$_FILES["image"]["tmp_name"];
if(move_uploaded_file($temp_name,$target)){
    $sql="UPDATE `brand` SET `name`='$name', `image`='$img' WHERE `id`='$id'";
}
}
else{
    
   $sql="UPDATE `brand` SET `name`='$name'WHERE `id`='$id'";
}
$query=mysqli_query($con,$sql);
if(isset($query)){
    header("location:../brand-manage.php?msg=Brand is updated.");
}
else{
    header("location:../update_brand.php?msg=Brand is not update&id= $id");

}


?>