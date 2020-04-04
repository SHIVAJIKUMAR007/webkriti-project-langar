<?php
ob_start();
session_start();

$oid = $_GET['oid'];

// connectinon of db
include_once('db_connect.php');
//db connected

$update_status = "UPDATE `order_table` SET `stetus`='not will to rate' WHERE o_id='$oid'";
$queryfire_update_status = mysqli_query($con, $update_status);

echo "<script>window.open('rate_us.php','_self')</script>";
?>