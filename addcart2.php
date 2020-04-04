<?php
ob_start();
session_start();
// connectinon of db
include_once('db_connect.php');
 
$user = $_SESSION['username'];
// echo $user;
$quantity=$_POST['quantity'];
if($quantity==0)
    {$quantity=1;}
// echo $quantity;
$fid=$_GET['f_id'];
// echo $fid;
// echo $_SESSION['rid'];

//adding of quantity start 
$other_res_food = "SELECT `username`, `f_id`, `r_id`, `quantity` FROM `cart` WHERE username='$user' && r_id !='2'"; 
$queryfire1_other_res_food = mysqli_query($con,$other_res_food); 
$num_other_res_food = mysqli_num_rows($queryfire1_other_res_food);
// if in the cart no other restaurant's food exists
if($num_other_res_food==0)
{
  $query1 = "SELECT `username`, `f_id`, `r_id`, `quantity` FROM `cart` WHERE username='$user' && f_id ='$fid";
  $queryfire1 = mysqli_query($con,$query1);
  $num = mysqli_num_rows($queryfire1);
  $cart_detail = mysqli_fetch_array($queryfire1); 
  $quan = $cart_detail['quantity'];
  
  
  if($num==0)      //there is no row for this f_id in table cart
  {
         $query="INSERT INTO `cart` (`username`, `f_id`, `r_id`, `quantity`) VALUES ('$user','$fid','2', '$quantity')";
  
         if($result= mysqli_query($con,$query)){
              echo "<script>alert('product added to cart')</script>";
              echo "<script>window.open('resturant2.php','_self')</script>";
                
         }   
  }
  else            //there is some row for this f_id in table cart so updating the quantity only.
  {
         $quantity=$quan+$quantity;
         $query2 = "UPDATE `cart` SET `quantity`='$quantity' WHERE username='$user' && f_id ='$fid";
         $queryfire2 = mysqli_query($con,$query2);
         echo "<script>alert('product added to cart')</script>";
         echo "<script>window.open('resturant2.php','_self')</script>";
  }
}
else 
{
  echo '<script>alert("you can order only from one restaurant in one order")</script>';
  echo "<script> window.open('resturant2.php','_self')</script>";
}
//adding of quantity end
?>

