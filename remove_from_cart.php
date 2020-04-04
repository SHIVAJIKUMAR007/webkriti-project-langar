<?php
ob_start();
session_start();

// connectinon of db
include_once('db_connect.php');
//db connected
$user=$_SESSION['username'];
echo $user;
$fid=$_GET['fid'];
echo $fid;

$query = "DELETE FROM `cart` WHERE username='$user' && f_id='$fid'";

if($queryfire=mysqli_query($con,$query)){
    header('location: cart.php');
}
else 
echo "technical problem";

?>