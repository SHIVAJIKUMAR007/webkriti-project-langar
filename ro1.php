<?php
ob_start();
session_start();

?>
<!DOCTYPE html>
<head>
    <title>Order Recieving from Restaurent01</title>

    <meta name="keywords" content="24 hours online food delivery services in Gwalior, Food delivery in the train, Online food in the train, online food delivery in Gwalior, food delivery in Gwalior, food in train, order food in the train, online food delivery in the train, railway food delivery, food delivery at Gwalior railway station.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

</style>
</head>

<body>
    <div style=" background-image:url('https://prod-c2i.s3.amazonaws.com/articles/14776280735812d0a9a5c1c.jpg'); background-repeat: no-repeat; 
    
    height:560px;
    background-size: cover;
    width: 100%;
    ">
 <a href="homelangar.php"><img src="logo.jfif" height="100pxl" width="100pxl" hspace="10pxl" vspace="10pxl" style="float:left;margin:30px;"/></a>
<div align="right">
<table ><br>
<tr>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="contact.html" style="text-decoration: none;margin-top:0px;display:inline; color: rgb(51, 202, 13);">CONTACT US</td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="add_dish.php" style="text-decoration: none;margin-top:0px;display:inline; color:rgb(51, 202, 13);">ADD NEW DISH</td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="logout.php" style="text-decoration: none;margin-top:0px;display:inline; color: rgb(51, 202, 13);">LOGOUT</a> </td>
</tr>
</table><br><br><br>
</div>
        <h1 style="font-size: 70px; text-align: center;color:yellow; font-weight: 300; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; ">
            <strong> NON-VEG PAVILION </strong> 
        </h1>
        <center><h2>your restaurant id = 1</h2></center>
        </div>


<br><br><h1> <center>HERE ARE THE RECIEVED ORDERS</center></h1><br>

<?php
// connectinon of db
include_once('db_connect.php');
//db connected

$fetch_order = "SELECT * FROM `order_table` WHERE r_id='1' && stetus ='pending'";
$queryfire_fetch_order = mysqli_query($con, $fetch_order);

while($fetch_order_array =mysqli_fetch_array($queryfire_fetch_order))
{
    $oid = $fetch_order_array['o_id'];  
    $user = $fetch_order_array['username'];
    $name = $fetch_order_array['name'];  
    $email = $fetch_order_array['email'];  
    $contact = $fetch_order_array['contact no'];  
    $address = $fetch_order_array['address'];  
    $landmark = $fetch_order_array['landmark'];
    $state = $fetch_order_array['state'];
    $country = $fetch_order_array['country'];
    $pin = $fetch_order_array['pincode'];
    $amount_to_rec = $fetch_order_array['amount_to_rec'];



    //code to check
    
    ?><br> <h4 style="border-bottom:1px solid black;border-top:1px solid black;padding-right:30px;padding-left:30px; height:145px;">
     <p style="clear: left; float:left;">NAME OF CUSTOMER : <?php echo $name ?> </p> <p style="text-align:right;">REF NO : <?php echo $oid ?></p>
     <p style="clear: left; float:left;">CONTACT : <?php echo $contact ?> </p> <p style="text-align:right;">EMAIL : <?php echo $email ?></p>
     <p style="clear: left; float:left;">ADDRESS : <?php echo $address ?>, <?php echo $landmark ?>, <?php echo $state ?> -  <?php echo $pin ?></p>

      </h4><?php 

     $query_order = "SELECT * FROM `my_order` WHERE o_id='$oid' && username='$user' && stetus ='pending'";  
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
     <p style="float:left;">TOTAL AMOUNT TO PAY =  Rs <?php echo $amount_to_rec ?>/- </p>
     <p ><form action="check_otp.php?ref_no=<?php echo $oid ?>" method="POST" style="margin-left:1000px" >     
     <label>ENTER THE OTP HERE : </label>
     <input type="text" name="otp" placeholder="ENTER THE OTP" >
    <input type="submit">     
     </form></p>
      </h4><br><br><?php

}
?>

</body>
</html>




















