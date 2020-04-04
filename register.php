<?php
ob_start();
session_start();

if(!isset($_POST['username']))
{
    header('location:login.php');
}
if(!isset($_POST['pass']))
{
    header('location:login.php');
}

// connectinon of db
 include_once('db_connect.php');
//db connected
$user=$_POST['username'];
$pass=$_POST['pass'];
$str_pass=password_hash($pass,PASSWORD_BCRYPT);
$email=$_POST['email'];
$contact=$_POST['contact'];
$query="SELECT * FROM `user` WHERE username= '$user'";

$result= mysqli_query($con,$query);
$num = mysqli_num_rows($result);

if($num>=1){
    echo "<script>alert('username already exist, choose a diffrent username')</script>";
    echo "<script>window.open('signup.php','_self')</script>";
    }
    else{
    $insert = "INSERT INTO `user`(`username`, `pass`, `email`, `contact no`) VALUES ('$user','$str_pass','$email','$contact')";
    if($insert=mysqli_query($con,$insert)){
    $register="successfully registered now login";
    $_SESSION['insert']=$register; 
    header('location:login.php');
    }
    }

?>