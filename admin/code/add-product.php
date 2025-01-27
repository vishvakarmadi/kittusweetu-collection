<?php
session_start();
include("connection.php");

$status=false; 
// product 
if(isset($_POST["ProductName"]) &&!empty($_POST['ProductName'])){
   $Product_name=$_POST["ProductName"]; 
}
else{
$_SESSION["Error_ProductName"]="Product name is riquired.";
$status=true;
}
// category
if(isset($_POST["category"]) &&!empty($_POST['category'])){
   $category=$_POST["category"]; 
}
else{
$_SESSION["Error_category"]="category name is riquired.";
$status=true;
}
// sub_category
if(isset($_POST["sub_catgory"]) &&!empty($_POST['sub_catgory'])){
   $sub_catgory=$_POST["sub_catgory"]; 
}
else{
$_SESSION["Error_sub_catgory"]="sub-catgory name is riquired.";
$status=true;
}
// brand
if(isset($_POST["brand"]) &&!empty($_POST['brand'])){
   $brand=$_POST["brand"]; 
}
else{
$_SESSION["Error_brand"]="Brand name is riquired.";
$status=true;
}
// dscription
if(isset($_POST["Description"]) &&!empty($_POST['Description'])){
   $Description=$_POST["Description"]; 
}
else{
$_SESSION["Error_Description"]="Description  is riquired.";
$status=true;
}
// selling price
if(isset($_POST["Selling_Price"]) &&!empty($_POST['Selling_Price'])){
   $Selling_Price=$_POST["Selling_Price"]; 
}
else{
$_SESSION["Error_Selling_Price"]="Selling Price  is riquired.";
$status=true;
}
// Mrp
if(isset($_POST["mrp"]) &&!empty($_POST['mrp'])){
   $mrp=$_POST["mrp"]; 
}
else{
$_SESSION["Error_mrp"]="Mrp is riquired.";
$status=true;
}
// quantity
if(isset($_POST["quantity"]) &&!empty($_POST['quantity'])){
   $quantity=$_POST["quantity"]; 
}
else{
$_SESSION["Error_quantity"]="Quantity is riquired.";
$status=true;
}
// Discount
if(isset($_POST["Discount"]) &&!empty($_POST['Discount'])){
   $Discount=$_POST["Discount"]; 
}
else{
$_SESSION["Error_Discount"]="Discount is riquired.";
$status=true;
}

// status
if(isset($_POST["status"]) &&!empty($_POST['status'])){
   $status1=$_POST["status"]; 
}
else{
$_SESSION["Error_status"]="Status is riquired.";
$status=true;
}
if(isset($_FILES["image"]) &&!empty($_FILES["image"]["name"])){
   $img_name=$_FILES["image"]["name"]; 
   $img_name=time().rand(1,999).$img_name;
   $target='../uplode/product/'.$img_name;
   $tmp_name=$_FILES["image"]["tmp_name"]; 

}
else{
$_SESSION["Error_img"]="Product Image is riquired.";
$status=true;
}
// print_r($_POST);
if($status==true){
   header("location:../add_product.php?msg=invalid");
    exit();
}
if(move_uploaded_file($tmp_name,$target)){
  $sql="INSERT INTO `product`( `product_name`, `category_id`, `sub_category_id`, `brand_id`, `product_img`, `description`, `selling_price`, `mrp`,  `discount`,`quantity`, `status`) VALUES ('$Product_name','$category','$sub_catgory','$brand','$img_name','$Description','$Selling_Price','$mrp','$Discount','$quantity','$status1')";
  $query=mysqli_query($con,$sql);
  if(isset($query)){
   header("location:../add_product.php?msg=Product add is  sucsessfuly.");
}
else{
   header("location:../add_product.php?msg=Product add is not insert.");

}
}
?>