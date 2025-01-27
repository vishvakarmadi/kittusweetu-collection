<?php 
include("connection.php");
session_start();
$status=false;

if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"])){
   $img= $_FILES["image"]["name"];
   $img=time().rand(1,999).$img;
   $target="../uplode/slider/".$img;
   $temp_name=$_FILES["image"]["tmp_name"];
}
else{
    $_SESSION["error_imag_name"]="Image name is requared.";
    $status=true;
}

if($status==true){
    header("location:../slider-add.php?msg=invalid");
    exit();
}

if(move_uploaded_file($temp_name,$target)){
    $sql="INSERT INTO `slider`(`image_name`) VALUES ('$img')";
    $query=mysqli_query($con,$sql);
    if(isset($query)){
        header("location:../slider-add.php?msg=Slider add is  sucsessfuly.");
    }
    else{
        header("location:../slider-add.php?msg=slider is not insert.");

    }
}
?>