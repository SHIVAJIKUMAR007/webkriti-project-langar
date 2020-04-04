<?php
ob_start();
session_start();

$oid = $_GET['oid'];
// echo $oid;
$rate = $_POST['rating'];
// echo $rate;


// connectinon of db
include_once('db_connect.php');
//db connected

$get_rid = "SELECT  `r_id` FROM `order_table` WHERE o_id='$oid'";
$queryfire_get_rid = mysqli_query($con, $get_rid);
$get_rid_array = mysqli_fetch_array($queryfire_get_rid);

$rid = $get_rid_array['r_id'];

$get_prev_detail="SELECT * FROM `rating` WHERE r_id='$rid'";
$queryfire_get_prev_detail = mysqli_query($con, $get_prev_detail);
$get_prev_detail_array = mysqli_fetch_array($queryfire_get_prev_detail);

$prev_num = $get_prev_detail_array['rate_num'];
$prev_total = $get_prev_detail_array['total_points'];
// echo $prev_num." ".$prev_total." ";

$new_num = $prev_num+1;
$new_total = $prev_total+$rate;
$new_av = $new_total/$new_num ;
// echo $new_num." ".$new_total." ";

$update_rating = "UPDATE `rating` SET `rate_num`='$new_num',`total_points`='$new_total',`av_rate`='$new_av' WHERE r_id='$rid'";
if($queryfire_update_rating = mysqli_query($con, $update_rating))
{
    $update_status = "UPDATE `order_table` SET `stetus`='rated' WHERE o_id='$oid'";
    if($queryfire_update_status = mysqli_query($con, $update_status))
       {
           echo "<script>alert('thanks, for the rating !!!')</script>";
           echo "<script>window.open('rate_us.php','_self')</script>";  
       }else{
        echo "<script>alert('some technical error occuring please visit after some time !!')</script>";
        echo "<script>window.open('rate_us.php','_self')</script>";
       }
}
else{
    echo "<script>alert('some technical error occuring please visit after some time !!')</script>";
    echo "<script>window.open('rate_us.php','_self')</script>";
}

?>