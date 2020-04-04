<?php
ob_start();
session_start();
$user=$_SESSION['username'];
if(!isset($_SESSION['username'])){
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>my orders</title>
</head>
<body style="padding-left:20px;padding-right:20px;padding-bottom:50px;">
<div style="background-color:#d9dbdb; padding-left:5px; padding-bottom:10px;padding-top:0px;">
<h1><div style="float:left;">
<a href="homelangar.php" style="text-decoration:none; color:red;"><img src="https://1.bp.blogspot.com/-XH2Bombqg8E/XlC5QTkZvuI/AAAAAAAAAQ4/IHJmZda6tEoed70j1HN_t_T5luccg4e8QCNcBGAsYHQ/s200/logo.jpg.jpeg" style="border-radius:50%;margin-top:10px; height:80px;"></a></div>
<div style="margin-left:55%; font-size:50px; padding-top:20px; "><span><a href="homelangar.php" style="text-decoration:none; color:red;">HOME</a>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="logout.php" style="text-decoration:none; color:red;">LOGOUT</a>
</span></div>
</h1></div>

<b style="background-color:"><hr><hr><p style="padding-left:20px;font-size:20px; font-family:Franklin Gothic Medium;">
<?php  echo $user ?> YOUR PENDING ORDERS
</p><hr><hr></b>
<br><br>
<a href="homelangar.php" style="text-decoration:none; width:20%; "><div style="font-family:Lucida Sans;border-radius:6px; border:2px solid black; width:20%;">
    <p style="color:black; font-weight:bold; text-align:center;">BACK</p>
</div></a>
<br><br>

<?php
// connectinon of db
include_once('db_connect.php');
//db connected

$select_oid = "SELECT `o_id`, `otp`,`amount_to_rec` FROM `order_table` WHERE username= '$user' && stetus ='pending'";
$queryfire_select_oid = mysqli_query($con, $select_oid);

while($oid_array =mysqli_fetch_array($queryfire_select_oid))
{    
    $oid = $oid_array['o_id'];
    $otp = $oid_array['otp'];
    $total_price_to_pay = $oid_array['amount_to_rec'];
    
    ?><br> <h4 style="border-bottom:1px solid black;border-top:1px solid black;padding-right:30px;padding-left:30px;">
    <p style="float:left;"> OTP : <?php echo $otp ?> </p> <p style="text-align:right;">REF NO : <?php echo $oid ?></p>
     </h4><?php

     $query_order = "SELECT * FROM `my_order` WHERE o_id='$oid' && username='$user' && stetus='pending'";  
     $queryfire_query_order = mysqli_query($con, $query_order);
     
    while($order_array =mysqli_fetch_array($queryfire_query_order))
    {
        $fid= $order_array['f_id'];
        $query1="SELECT `name`,`image`, `price` FROM `food` WHERE f_id='$fid'";
        $queryfire1=mysqli_query($con,$query1);
        $food_detail = mysqli_fetch_array($queryfire1);
        $total_price =  $order_array['quantity']*$food_detail['price'];
       
        ?>
    <div style="padding:20px; border-bottom:1px solid red; height:210px">
    <div>
        <div ><img src="<?php  echo $food_detail['image']; ?>" style="margin-bottom:30px; margin-left:30px; margin-right:120px; height:180px; width:270px; clear: left; float:left;"> </div>
      <div>
          <h1>
           <div style="float:left;  "> <?php echo $food_detail['name']; ?> </div>
           <div style="text-align: right; padding-right:50px;">Rs <?php echo $total_price; ?>/- </div>
          </h1>
          <h3>QUANTITY = <?php echo $order_array['quantity'];?></h3>
          <h3>rate = Rs <?php echo $food_detail['price'];?> /-</h3>      
       </div> 
       
    </div>
    </div>
    <?php
    }
    ?><br><h4 style="border-bottom:1px solid black;border-top:1px solid black;padding-right:30px;padding-left:30px;" >
    <p style="float:left;">TOTAL AMOUNT TO PAY </p><p style="text-align:right;"> Rs <?php echo $total_price_to_pay ?>/-</p>
     </h4><br><br><?php
}
?>
<br><br>
</body>
</html>