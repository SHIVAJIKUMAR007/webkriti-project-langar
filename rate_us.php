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
<title>rate us</title>
<style>
.rate-area {
  float: left;
  border-style: none;
}
.rate-area:not(:checked) > input {

  position: absolute;

  top: -9999px;

  clip: rect(0,0,0,0);
}
 
.rate-area:not(:checked) > label {
  float: right;
  width: 1em;
    padding: 0 .1em;
  overflow: hidden;
  white-space: nowrap;
  cursor: pointer;
  font-size: 400%;
  line-height: 1.2;
  color: lightgrey;
  text-shadow: 1px 1px #bbb;
}
.rate-area:not(:checked) > label:before { content: '★ '; }
.rate-area > input:checked ~ label {
  color: gold;
  text-shadow: 1px 1px #c60;
  font-size: 450% !important;
}
.rate-area:not(:checked) > label:hover, .rate-area:not(:checked) > label:hover ~ label { color: gold; }
.rate-area > input:checked + label:hover, .rate-area > input:checked + label:hover ~ label, .rate-area > input:checked ~ label:hover, .rate-area > input:checked ~ label:hover ~ label, .rate-area > label:hover ~ input:checked ~ label {
  color: gold;
  text-shadow: 1px 1px goldenrod;
}
.rate-area > label:active {
  position: relative;
  top: 2px;
  left: 2px;
}
</style>
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
<?php  echo $user ?> RATE US
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

$select_oid = "SELECT `o_id`,`r_id` FROM `order_table` WHERE username= '$user' && stetus ='delivered not rated'";
$queryfire_select_oid = mysqli_query($con, $select_oid);
$num = mysqli_num_rows($queryfire_select_oid);
if($num>0)
    {
    $ser_no=1;

while($oid_array =mysqli_fetch_array($queryfire_select_oid))
{    
    $oid = $oid_array['o_id'];
    $rid = $oid_array['r_id'];

    $fetch_res_name = "SELECT  `name` FROM `restaurant` WHERE r_id='$rid'";
    $queryfire_fetch_res_name = mysqli_query($con, $fetch_res_name);
    $res_name_array =mysqli_fetch_array($queryfire_fetch_res_name);
    $res_name = $res_name_array['name'];
    
    ?><div style=" border-radius:20px; padding-left:50px; padding-top:10px; padding-bottom:10px; border:1px solid black;"><?php echo $ser_no ?>)&nbsp; RESTAURANT NAME : <?php echo $res_name ?><br><br>
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;REF NO : <?php echo $oid ?><br><br>

 <!-- rating system on -->
<form action="insert_rate.php?oid=<?php echo $oid ?>"   method="POST"> <ul class="rate-area">
  <input type="radio" id="5-star" name="rating" value="5" /><label for="5-star" title="Amazing">5 stars</label>
  <input type="radio" id="4-star" name="rating" value="4" /><label for="4-star" title="Good">4 stars</label>
  <input type="radio" id="3-star" name="rating" value="3" /><label for="3-star" title="Average">3 stars</label>
  <input type="radio" id="2-star" name="rating" value="2" /><label for="2-star" title="Not Good">2 stars</label>
  <input type="radio" id="1-star" name="rating" value="1" /><label for="1-star" title="Bad">1 star</label>
</ul><br><br>
<button style="margin-left:200px;height:25px;width: 75px;">submit</button></form>
      <!-- rating system end   -->
    
    <br><br>
    <form action="not_rate.php?oid=<?php echo $oid ?>" method="post"><input type="submit" value="DON'T WANT TO RATE"></form>
  </div> <br>  
     <?php   
     $ser_no++;
}  
  }
  else
  {
      echo "<center><h1> You have not shop anything yet or previous orders are rated. <center><h1>";
  }
?>
<br><br>
</body>
</html>