<?php
ob_start();
session_start();

// connectinon of db
include_once('db_connect.php');
//db connected
?>

<!DOCTYPE html>
<html>
<head>
<title>nonveg</title>
</head>
<body>
    <div style=" background-image:url('https://prod-c2i.s3.amazonaws.com/articles/14776280735812d0a9a5c1c.jpg'); background-repeat: no-repeat; 
    
    height:560px;
    background-size: cover;
    width: 100%;">
<a href="homelangar.php"><img src="logo.jfif" height="100pxl" width="100pxl" hspace="10pxl" vspace="10pxl" style="float:left;margin:30px;"/></a>
<div align="right">
<table ><br>
<tr>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="homelangar.php" style="text-decoration: none;margin-top:0px;display:inline; color: rgb(51, 202, 13);">HOME</td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="my_orders.php" style="text-decoration: none;margin-top:0px;display:inline; color: rgb(51, 202, 13);">MY ORDERS</td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="cart.php" style="text-decoration: none;margin-top:0px;display:inline; color:rgb(51, 202, 13);">CART OF <?php  echo $_SESSION['username'] ?></td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="logout.php" style="text-decoration: none;margin-top:0px;display:inline; color: rgb(51, 202, 13);">LOGOUT</a> </td>
</tr>
</table><br><br><br>
</div>
<h1 style="font-size: 70px; text-align: center;color:yellow; font-weight: 300; font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif; ">
 <strong> NON-VEG PAVILION </strong> 
</h1>
<h2 style="font-size: 25px; text-align: center; color:rgb(7, 3, 194); font-weight: 300; font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif ">
    <strong>Near DD Mall, Gwalior </strong> 
</h2>
<h4 style="font-size: 25px; text-align: center; color:brown; font-weight: 300; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif ">
    <strong>Come, Eat, Repeat </strong> 
</h4>
 <!-- code for display rating -->
 <?php
  
  $get_av_rate = "SELECT `rate_num`,`av_rate` FROM `rating` WHERE r_id='1'";
  $queryfire_get_av_rate = mysqli_query($con,$get_av_rate);
  $get_av_rate_array = mysqli_fetch_array($queryfire_get_av_rate);
  $av_rate = $get_av_rate_array['av_rate'];
  $num_reviews = $get_av_rate_array['rate_num'];
  ?>
  <center>
      <div style="width:max-content; height:40px; background-color:black; padding;5px; border-radius:10px;">
           <b> <h2 style="font-family: ; color:green;"> ★  <?php echo $av_rate  ?> ( <?php echo $num_reviews  ?> reviews )  </h2><b>
       </div>
       </center>
  <?php
?>
    <!-- coding for rating ends -->
<br><br><br><br><br><br>
<center><h1>MENU</h1></center>

<!-- php coding start here -->
<?php

$food= "SELECT`r_id`,`f_id`, `name`, `tagline`, `image`, `price` FROM `food` WHERE r_id=1 order by f_id ASC ";
$queryfire = mysqli_query($con , $food);

$num = mysqli_num_rows($queryfire);

if($num >0){
	 
	while($fooditem = mysqli_fetch_array($queryfire))
	{
     ?>
    
<div style="border-width:2px;border-style:solid;margin-top:10px; background-color:pink; border-radius: 50px; height:200px; ">
<img src="<?php echo $fooditem['image']  ?>" style=" margin-top:10px; margin-left:50px; margin-right:300px;margin-bottom:0px;width:500px;height:180px; float:left;"/>
    <div style="float:left; ">
     <p style="color:black; font-size: 25px;"><?php echo $fooditem['name']  ?> </p> 
     <p style="margin-top:10px;color:black;font-size: 20px;color: darkblue;margin-bottom:0px;"><?php echo $fooditem['tagline']  ?> </p>
    </div>
     <table><tr>
      <td><p style="font-size:35px;font-weight:bold;margin-left:30px;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rs <?php echo $fooditem['price']  ?>/-</p></td></tr></table>
   
   <?php $fid= $fooditem['f_id']; 
      
     ?>
    <form action="addcart1.php?f_id=<?php echo $fid  ?>" method="post" >
    <input type ="number"  name = "quantity" min="0" placeholder="quantity" style="padding-top:5px;padding-bottom:5px;padding-left:20px;background-color:white;border:2px solid black;border-radius:5px;">
     <br><input type="submit" value=" ADD TO CART " style="margin-top : 10px;margin-left:20px; cursor: pointer; background-color: #336abd;border:2px solid #336abd; border-radius: 20px;padding :10px; font-size:15px;color:white;">
    </form>
    </div>
 <?php
    }
}
?>
<!-- php coding ends here -->

</div>
    </div>
</div>
</body>
</html>

