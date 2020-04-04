<?php
ob_start();
session_start();

$oid= $_GET['ref_no'];
echo $oid;
$get_otp=$_POST['otp'];
echo $get_otp;

// connectinon of db
include_once('db_connect.php');
//db connected

$find_otp ="SELECT `otp`,`r_id` FROM `order_table` WHERE o_id='$oid'";
$queryfire_find_otp = mysqli_query($con,$find_otp);
$array_find_otp = mysqli_fetch_array($queryfire_find_otp);

$otp=$array_find_otp['otp'];
// echo $otp;
$rid=$array_find_otp['r_id'];
$fetch_url = "SELECT `owner_page` FROM `restaurant` WHERE r_id ='$rid'";
$queryfire_fetch_url = mysqli_query($con,$fetch_url);
$array_fetch_url = mysqli_fetch_array($queryfire_fetch_url);
$r_url= $array_fetch_url['owner_page'];

if($otp==$get_otp)
{
  //code to update order status
  $update_order_stetus ="UPDATE `order_table` SET `stetus`='delivered not rated' WHERE o_id='$oid'";
  $queryfire_update_order_stetus= mysqli_query($con,$update_order_stetus );

  $delete_my_order ="DELETE FROM `my_order` WHERE o_id='$oid'";
  $queryfire_delete_my_order= mysqli_query($con,$delete_my_order );
  
  echo "<script>alert('Right OTP, food is delivered! ')</script>";
    echo "<script>window.open('$r_url','_self')</script>";

}else
{
    echo "<script>alert('wrong OTP, please enter a right OTP!')</script>";
    echo "<script>window.open('$r_url','_self')</script>";
}
?>