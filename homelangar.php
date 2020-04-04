<?php
ob_start();
session_start();
if(!isset($_SESSION['username'])){
     header('location:login.php');
}
?>
<html>
<head>
<title>Home Page</title>
<style>
     #headbar
{
background-image:url("langar9 (1).webp");
background-position:center;
background-repeat:no-repeat;
background-size:cover;
height:500px;
}
p
{
font-size:40px;
}
a:link
{
color:yellow;
text-decoration:none;
}
     </style>
</head>
<body>
<div id="headbar">
<img src="logo.jfif" height="100pxl" width="100pxl" hspace="10pxl" vspace="10pxl" style="float:left;position:fixed;"/>
<div align="right">
<table >
<tr>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="my_orders.php" style="color:yellow;">MY ORDERS</td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="cart.php" style="color:yellow;">CART OF <?php  echo $_SESSION['username'] ?></td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="rate_us.php" style="color:yellow;">RATE US</td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="contact.html" style="color:yellow;">CONTACT </td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="help.html" style="color:yellow;">HELP </td>
<td style="font-weight:bold; font-size:25px; display:inline; margin-right:80px;"><a href="logout.php" style="color:yellow">LOGOUT</a> </td>
</tr>
</table>
</div>
<p style="font-size:60px; color: brown; margin-top:230px; margin-left:100px; margin-bottom:10px;font-family:'Comic Sans MS'"> Zomato se accha</p>
<p style="font-size:60px; color: brown; margin-top:0px;margin-left:100px;font-family:'Comic Sans MS', Helvetica, sans-serif;"> Swiggy se behtar</p>
</div>
<div style="background-color:white;border-width:3px;height:750px;">
<center><h1>RESTURANTS</h1></center>
<?php
// connectinon of db
 include_once('db_connect.php');
//db connected

$restaurant= "SELECT `r_id`, `name`, `address`, `tagline`, `image`, `restaurant_page` FROM `restaurant` order by r_id ASC ";
$queryfire = mysqli_query($con , $restaurant);

$num = mysqli_num_rows($queryfire);

if($num >0){
	 
	while($restau = mysqli_fetch_array($queryfire))
	{
         $rid= $restau['r_id'];

         $get_av_rate = "SELECT `rate_num`,`av_rate` FROM `rating` WHERE r_id='$rid'";
         $queryfire_get_av_rate = mysqli_query($con,$get_av_rate);
         $get_av_rate_array = mysqli_fetch_array($queryfire_get_av_rate);
         $av_rate = $get_av_rate_array['av_rate'];
         $num_reviews = $get_av_rate_array['rate_num'];
     ?>
     <div style="border-width:2px;border-style:solid;margin-top:10px; background-color:rgb(200, 200, 223); border-radius: 50px; ">
     <a href=" <?php echo $restau['restaurant_page']  ?>  ">
	 
	 
	 <img src="<?php echo $restau['image']  ?>" style="margin-top:15px; margin-left:50px; margin-right:300px;margin-bottom:0px;width:500px;height:180px; float:left;"/>
     <p style="color:black;"> <?php echo $restau['name']  ?><br><?php echo $restau['address']  ?></p> 
     <div><p style="margin-top:10px; margin-right:30px; color:black;font-size: 20px; float:left;"><?php echo $restau['tagline']  ?></p></div>
      <!-- code for display rating -->
 <h2 style="font-family: ; color:green;"> ★  <?php echo $av_rate  ?> ( <?php echo $num_reviews  ?> reviews )  </h2> 
      <!-- coding for rating ends -->
     </a>
</div>
<?php
	}
}
?>

</div>
<div style="background-color: transparent; border-radius:20px;">
<h2 style="font-weight:bold;padding-top:20px;"> ABOUT US</h2>
<hr/><hr/>
<h2>Terms of Service:</h2>
<table style="font-size:20px;margin-right:0px;">
<tr>
<td>1. Acceptance of terms</td>
 <td>2.eligibility to use the service</td>
 <td>3.changes to the terms</td>
</tr>
<tr>
<td>4.translation of terms<td>
<td>
 5.provision of the services being offered by Langar</td>
 <td>
 6.use of services by you or user</td>
</tr>
<tr>
	<td>
 7.Content guidelines and privacy policy</td><td>8.Restrictions on use</td><td>9.User feedback</td></tr>
 <tr><td>10.Advertising</td><td>11.Additional terms and conditions</td></tr>
</p>

</div>
</body>
</html>