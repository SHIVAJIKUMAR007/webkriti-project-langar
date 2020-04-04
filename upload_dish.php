<?php
ob_start();
session_start();

$image_name=$_FILES['image']['name'];
$image_temp_name=$_FILES['image']['tmp_name'];
// $imgge_size = $_FILES['image']['size'];
// if($imgge_size<)
$image_path="images/".$image_name;
move_uploaded_file($image_temp_name,$image_path);

$rid =$_POST['rid'];
$name =$_POST['name'];
$price =$_POST['price'];
$tagline =$_POST['tagline'];

// connectinon of db
include_once('db_connect.php');
//db connected

$upload_food = "INSERT INTO `food`(`r_id`, `name`, `tagline`, `image`, `price`) VALUES ('$rid','$name','$tagline','$image_path','$price')";
if($queryfire_upload_food = mysqli_query($con,$upload_food))
{
    echo "<script>alert('food is uploaded')</script>";
    echo "<script>window.open('add_dish.php','_self')</script>";
}
else{
    echo "<script>alert('some error coming, contact to our technical support')</script>";
    echo "<script>window.open('add_dish.php','_self')</script>";  
}

?>