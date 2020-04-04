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
$user=$_POST['username'];
$pass=$_POST['pass'];

$query="SELECT * FROM `user` WHERE username= '$user'";

$queryfire= mysqli_query($con,$query);
$result=mysqli_fetch_array($queryfire);
$check_pass=$result['pass'];

// $checked=password_verify($pass,$check_pass);
// $num = mysqli_num_rows($result);

if($checked=password_verify($pass,$check_pass)){
    $_SESSION['username']=$user;
    header('location:homelangar.php');
    }
    else{
        $wrong ="Wrong Credentials";
    $_SESSION['error'] =   $wrong;
    header('location: login.php');
    }

?>