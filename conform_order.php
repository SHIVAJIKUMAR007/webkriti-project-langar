<?php
ob_start();
session_start();
$user=$_SESSION['username'];
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

// connectinon of db
include_once('db_connect.php');
//db connected

$name = $_POST['name'];
$contact = $_POST['contact'];
$email = $_POST['email'];
$add = $_POST['add'];
$landmark = $_POST['landmark'];
$state = $_POST['state'];
$country = $_POST['country'];
$pincode = $_POST['pincode'];
$amount_to_rec = $_GET['gt'];
$status = "pending";
$otp = rand(10000000,99999999);

/* 
 finding r_id 
*/

 $finding_rid = "SELECT `r_id` FROM `cart` WHERE username='$user'";
$queryfire_cart= mysqli_query($con, $finding_rid);
$rid_array =mysqli_fetch_array($queryfire_cart);
$rid= $rid_array['r_id'];



$insert="INSERT INTO `order_table`(`username`, `r_id`, `name`, `email`, `contact no`, `address`, `landmark`, `state`, `country`, `pincode`, `amount_to_rec`, `stetus`, `otp`) VALUES 
('$user', '$rid','$name','$email','$contact','$add','$landmark','$state','$country','$pincode','$amount_to_rec','$status','$otp')";

$queryfire=mysqli_query($con,$insert);

//finding order id

$find_oid ="SELECT `o_id` FROM `order_table` WHERE username='$user' && otp='$otp'";
$queryfire_find_oid = mysqli_query($con,$find_oid);
$array_find_oid = mysqli_fetch_array($queryfire_find_oid);

$oid=$array_find_oid['o_id'];

// selecting stuff from cart
$cart= "SELECT * FROM `cart` WHERE username='$user'";
$queryfire_cart= mysqli_query($con, $cart);

while($cart_array =mysqli_fetch_array($queryfire_cart))
{    
   $fid = $cart_array['f_id'];
   $rid = $cart_array['r_id'];
  
   $quantity = $cart_array['quantity'];
  
   $order_insert = "INSERT INTO `my_order`(`username`, `o_id`, `f_id`, `r_id`, `quantity`, `stetus`) VALUES ('$user','$oid','$fid','$rid','$quantity','pending')";
    $queryfire_order_insert  = mysqli_query($con,$order_insert);
   
}
$delete_cart = "DELETE FROM `cart` WHERE username='$user'";
$queryfire_delete_cart = mysqli_query($con,$delete_cart); 

echo "<script>alert('your order have been received, Thank for giving us chance to service')</script>";
echo "<script>window.open('my_orders.php','_self')</script>";
?>