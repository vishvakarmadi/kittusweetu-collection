<?php 
include("connection.php");
session_start();
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
}
else{
    $_SESSION["error_imag_name"]="Image name is requared.";
    $status=true;
}

if($status==true){
    header("location:../brand-add.php?msg=invalid");
    exit();
}

if(move_uploaded_file($temp_name,$target)){
    $sql="INSERT INTO `brand`(`name`, `image`)  VALUES ('$name','$img')";
    $query=mysqli_query($con,$sql);
    if(isset($query)){
        header("location:../brand-add.php?msg=Brand add is  sucsessfuly.");
    }
    else{
        header("location:../brand-add.php?msg=Brand add is not insert.");

    }
}
?>