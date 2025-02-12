
<?php
session_start();
include("connection.php");
$id=$_POST["id"];
$status = false;
// product 
if (isset($_POST["ProductName"]) && !empty($_POST['ProductName'])) {
   $Product_name = $_POST["ProductName"];
} else {
   $_SESSION["Error_ProductName"] = "Product name is riquired.";
   $status = true;
}
// category
if (isset($_POST["category"]) && !empty($_POST['category'])) {
   $category = $_POST["category"];
} else {
   $_SESSION["Error_category"] = "category name is riquired.";
   $status = true;
}
// sub_category
if (isset($_POST["sub_catgory"]) && !empty($_POST['sub_catgory'])) {
   $sub_catgory = $_POST["sub_catgory"];
} else {
   $_SESSION["Error_sub_catgory"] = "sub-catgory name is riquired.";
   $status = true;
}
// brand
if (isset($_POST["brand"]) && !empty($_POST['brand'])) {
   $brand = $_POST["brand"];
} else {
   $_SESSION["Error_brand"] = "Brand name is riquired.";
   $status = true;
}
// dscription
if (isset($_POST["Description"]) && !empty($_POST['Description'])) {
   $Description = $_POST["Description"];
} else {
   $_SESSION["Error_Description"] = "Description  is riquired.";
   $status = true;
}
// selling price
if (isset($_POST["Selling_Price"]) && !empty($_POST['Selling_Price'])) {
   $Selling_Price = $_POST["Selling_Price"];
} else {
   $_SESSION["Error_Selling_Price"] = "Selling Price  is riquired.";
   $status = true;
}
// Discount
if(isset($_POST["Discount"]) &&!empty($_POST['Discount'])){
   $Discount=$_POST["Discount"]; 
}
else{
$_SESSION["Error_Discount"]="Discount is riquired.";
$status=true;
}
if($Selling_Price>$mrp || $Selling_Price==$mrp){
   $_SESSION["Error_mrp_pirce"]=" ";
}
else{
   $_SESSION["Error_mrp_pirce"]="Plese enter selling price because Price is  Greter than Mrp.";
   $status=true;
   }
// Mrp
if (isset($_POST["mrp"]) && !empty($_POST['mrp'])) {
   $mrp = $_POST["mrp"];
} else {
   $_SESSION["Error_mrp"] = "Mrp is riquired.";
   $status = true;
}
// quantity
if (isset($_POST["quantity"]) && !empty($_POST['quantity'])) {
   $quantity = $_POST["quantity"];
} else {
   $_SESSION["Error_quantity"] = "Quantity is riquired.";
   $status = true;
}
// status
if (isset($_POST["status"]) && !empty($_POST['status'])) {
   $status1 = $_POST["status"];
} else {
   $_SESSION["Error_status"] = "Status is riquired.";
   $status = true;
}
$res=($mrp-$Selling_Price)*100/$mrp;
$res1=number_format($res, 2);

if($Discount==$res1){
   $_SESSION["Error_prsent"] = " ";
 
}
else{
   $_SESSION["Error_prsent"] = "Discount  is wrong fill %"; 
   $status=true;
}
if ($status == true) {
   header("location:../update_product.php?msg=invalid&id=".$id);
   exit();
}
if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"])) {
   $img_name = $_FILES["image"]["name"];
   $img_name = time() . rand(1, 999) . $img_name;
   $target = '../uplode/product/' . $img_name;
   $tmp_name = $_FILES["image"]["tmp_name"];
   move_uploaded_file($tmp_name, $target);
   $sql = "UPDATE `product` SET `product_name`='$Product_name',`category_id`='$category',`sub_category_id`='$sub_catgory',`brand_id`='$brand',`product_img`='$img_name',`description`='$Description',`selling_price`='$Selling_Price',`mrp`='$mrp',`quantity`='$quantity',`discount`='$Discount',`status`='$status1' WHERE `id`=$id";
} else {
   $sql = "UPDATE `product` SET `product_name`='$Product_name',`category_id`='$category',`sub_category_id`='$sub_catgory',`brand_id`='$brand',`description`='$Description',`selling_price`='$Selling_Price',`discount`='$Discount',`mrp`='$mrp',`quantity`='$quantity',`status`='$status1' WHERE `id`=$id";
}
if (mysqli_query($con, $sql)) {
   header("location:../mange_product.php?msg=Product update is sucsessfuly.");
} else {
   header("location:../mange_product.php?msg=Product   is  not update.");
}
?>