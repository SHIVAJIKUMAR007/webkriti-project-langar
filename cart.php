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
<title>cart</title>
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
YOUR CART <?php  echo $user ?>
</p><hr><hr></b>
<br><br>
<a href="homelangar.php" style="text-decoration:none; width:20%; "><div style="font-family:Lucida Sans;border-radius:6px; border:2px solid black; width:20%;">
    <p style="color:black; font-weight:bold; text-align:center;">BACK TO SHOPPING</p>
</div></a>
<br><br>
<?php
// connectinon of db
include_once('db_connect.php');
//db connected

$query = "SELECT `username`, `f_id`, `r_id`, `quantity` FROM `cart` WHERE username='$user'";

$queryfire=mysqli_query($con,$query);
$num = mysqli_num_rows($queryfire);
$total=0;

if($num >0){
	 
	while($cartitem = mysqli_fetch_array($queryfire))
	{
        $fid= $cartitem['f_id'];
        $query1="SELECT `r_id`, `f_id`, `name`, `tagline`, `image`, `price` FROM `food` WHERE f_id='$fid'";
        $queryfire1=mysqli_query($con,$query1);
        $food_detail = mysqli_fetch_array($queryfire1);
        $total_price =  $cartitem['quantity']*$food_detail['price'];
        $total =$total+$total_price;
       
    ?>
    <div style="padding:20px; border-bottom:1px solid red; height:210px">
    <div>
        <div ><img src="<?php  echo $food_detail['image']; ?>" style="margin-bottom:30px; margin-left:30px; margin-right:120px; height:180px; width:270px; clear: left; float:left;"> </div>
      <div>
          <h1>
           <div style="float:left;  "> <?php echo $food_detail['name']; ?> </div>
           <div style="text-align: right; padding-right:50px;">Rs <?php echo $total_price; ?>/- </div>
          </h1>
          <h3>QUANTITY = <?php echo $cartitem['quantity'];?></h3>
          <h3>rate = Rs <?php echo $food_detail['price'];?> /-</h3>      
       </div> 
       <form action="remove_from_cart.php?fid=<?php echo $food_detail['f_id']; ?>" method="post" > 
          <input type="submit" value=" REMOVE "
           style="cursor:pointer; font-size:20px; font-waight:bold; color:white; border:3 px solid blue; background-color :blue; border-radius:10px;
            padding:5px; padding-left:20px; padding-right:20px;">
       </form>
    </div>
    </div>
    <?php
    }
    ?>
    
    <!-- price cart -->

    <br><br>
<center><div style="width:45%; align:">
<h4>   
    <div style="float:left;  "> TOTAL PRICE </div>
     <div style="text-align: right; padding-right:50px;">Rs <?php echo $total; ?>/- </div> 
<h4>
<h4>   
    <div style="float:left;  "> SERVICE CHARGE </div>
     <div style="text-align: right; padding-right:50px;">Rs <?php $service = 5*$total/100; echo $service; ?>/- </div> 
<h4><h4>   
    <div style="float:left;  "> GST (9%) </div>
     <div style="text-align: right; padding-right:50px;">Rs <?php $gst = 9*$total/100; echo $gst; ?>/- </div> 
<h4><h4>   
    <div style="float:left;  "> DELIVERY </div>
     <div style="text-align: right; padding-right:50px;">Rs 20/- </div> 
<h4><hr>
<h4>   
    <div style="float:left;  "> AMOUNT TO PAY </div>
     <div style="text-align: right; padding-right:50px;">Rs <?php $groce_total=$total+$service+$gst+20; echo $groce_total;?>/-</div> 
<h4><hr>

<form action="checkout.php?gt=<?php echo $groce_total; ?>" method="post">
<input type="submit" value="                Proceed to Checkout              "
           style="cursor:pointer; font-size:27px; font-weight:bold; border:3 px solid blue; background-color :green;
            padding:5px; padding-left:20px; padding-right:20px;">
</form>
</div></center>


    <?php
}
else
{
    echo "<center><h1>your cart is empty</h1></center>";
}
?>

</body>
</html>