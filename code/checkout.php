<?php 
print_r($_POST);
session_start();
include "../admin/code/connection.php";
$sataus=false;
// print_r($_POST);
$user_id = $_SESSION["user_id"];
if(isset($_POST['first_name']) && !empty($_POST['first_name'])){
    $first_name=$_POST['first_name'];
}
else{
$_SESSION["Error_first_name"]="first name is requered.";
$sataus=true;
}
if(isset($_POST['last_name']) && !empty($_POST['last_name'])){
    $last_name=$_POST['last_name'];
    $name=$first_name." ".$last_name;
}
else{
$_SESSION["Error_last_name"]="last name is requered.";
$sataus=true;
}
if(isset($_POST['country']) && !empty($_POST['country'])){
    $country=$_POST['country'];
    
}
else{
$_SESSION["Error_country"]="country is requered.";
$sataus=true;
}
if(isset($_POST['email']) && !empty($_POST['email'])){
    $email=$_POST['email'];
}
else{
$_SESSION["Error_email"]="email  is requered.";
$sataus=true;
}
if(isset($_POST['mobile']) && !empty($_POST['mobile'])){
    $mobile=$_POST['mobile'];
}
else{
$_SESSION["Error_mobile"]=" mobile is requered.";
$sataus=true;
}
if(isset($_POST['address']) && !empty($_POST['address'])){
    $address=$_POST['address'];
}
else{
$_SESSION["Error_address"]="address name is requered.";
$sataus=true;
}
if(isset($_POST['City']) && !empty($_POST['City'])){
    $City=$_POST['City'];
}
else{
$_SESSION["Error_City"]="City is requered.";
$sataus=true;
}
if(isset($_POST['State']) && !empty($_POST['State'])){
    $State=$_POST['State'];
}
else{
$_SESSION["Error_State"]="State is requered.";
$sataus=true;
}
if(isset($_POST['pin_code']) && !empty($_POST['pin_code'])){
    $pin_code=$_POST['pin_code'];
}
else{
$_SESSION["Error_pin_code"]="pin_code is requered.";
$sataus=true;
}
if(isset($_POST['Sub_total']) && !empty($_POST['Sub_total'])){
    $Sub_total=$_POST['Sub_total'];
}
if(isset($_POST['Shipping_Cost']) && !empty($_POST['Shipping_Cost'])){
    $Shipping_Cost=$_POST['Shipping_Cost'];
}
if(isset($_POST['total']) && !empty($_POST['total'])){
    $total=$_POST['total'];
}
if(isset($_POST['payment']) && !empty($_POST['payment'])){
    $payment=$_POST['payment'];
}
else{
    $_SESSION["Error_payment"]="payment is requered.";
    $sataus=true;
    }
if($sataus==true){
    header("location:../chechout.php?msg1=please fill the all inputs.");
    exit();
}
// die();
$oreders_sql="INSERT INTO `orders`(`user_id`, `sub_total`, `shipping_charg`, `payment_method`, `total`, `status`) 
                 VALUES ('$user_id','$Sub_total','$Shipping_Cost','$payment','$total','placed')";
if(mysqli_query($con,$oreders_sql)){
    $order_id=mysqli_insert_id($con);
 $sql = "SELECT cart.*, product.product_name,product.id AS pr_id ,product.product_img,product.selling_price  FROM cart  INNER JOIN product ON cart.product_id = product.id WHERE cart.user_id = '$user_id' and cart.`status`=1 ORDER BY cart.id DESC;";
  $res1=mysqli_query($con,$sql);
  while($cart_data=mysqli_fetch_array($res1 ,MYSQLI_ASSOC)){
  $product_id=$cart_data['product_id'];
  $qty=$cart_data['quantity'];
  $selling_price=$cart_data['selling_price'];
  $insert_order_sql=mysqli_query($con,"INSERT INTO `order_details`(`order_id`, `product_id`, `qty`, `selling_price`) VALUES ('$order_id','$product_id','$qty','$selling_price')");
   

  $update_product=mysqli_query($con,"update product set quantity=(quantity-$qty) where id='$product_id'");

  }
  $res=mysqli_query($con,"update cart set status='2' where user_id='$user_id'");

  
  $address_insert = mysqli_query($con, "INSERT INTO `order_address` (`name`, `user_id`, `email`, `mobile`, `address`, `city`, `state`, `pin_code`, `country`, `order_id`) VALUES ('$name','$user_id','$email','$mobile','$address','$City','$State','$pin_code','$country','$order_id')");

   header('location:../thank.php?msg=order Place &status=true');

}else{

   header('location:../product.php?msg1=server error &status=false');

}


?>