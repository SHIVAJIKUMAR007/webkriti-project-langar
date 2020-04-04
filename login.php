<?php
ob_start();
session_start();
?>

<html>
<head>
<title> LANGAR </title>
<style>
body
{
background-image:url('langar10.webp');
height:100%;
}
.xyz
{
font-size:50px;
color:yellow;
margin-top:6px;
}
.pqr
{
font-size:30px;
color:brown;
font-weight:bold;
}
a:link
{
color:#2eb8b8;
}
a:visited
{
color:brown;
}
a:hover
{
color:blue;
text-decoration:none;
}
::placeholder { 
  color: brown;
  opacity:1
}
.abc
{
font-weight:bold;
font-size: 50px;
color: brown;
}
</style>
<script>
	function validation()
{
	var result=true;
	var i=document.getElementsByTagName("input");
	if(i[0].value.length==0 || i[1].value.length<=6)
	{
	var result=false;
	alert("Please fill the form correctly");
    }
	return(result);
}
</script>
</head>
<body>
<center><h1 style="font-size:30px;color:yellow;font-family:'Comic Sans MS','Dancing Script','Arial'"> WELCOME TO LANGAR </h1></center>
<a href="index.html"><img src="logo.jfif" style="height:150px;width:150px;" hspace="670pxl" vspace="10pxl"/></a>
<center><div style="border:4px solid black; width:30%; background-color: grey;border-radius:35px;">
<center><?php
// error massage printing.
if(isset($_SESSION['insert'])){
echo $_SESSION['insert'];
session_destroy();
}
?></njmcenter>

<center><p class="abc">LOGIN</p></center>
<center><form action="checklogin.php" method="POST" onsubmit="return validation()">
<table>
<tr class="xyz">
<td ><input type="text" name="username" placeholder="username" style="margin-left:0px;"></td>
</tr>
<tr class="xyz">
<td ><input type="password" name="pass" placeholder="password atleast 6 digit"style="margin-top:20px; margin-left:0px;" ></td>
</tr>
<tr style="padding-top:50pxl">
<td><input type="submit" value="Login"style="padding: 2px 4px;height:40px;width:100px; margin-top:40px; margin-bottom:40px;margin-left:30px;"></td>
</tr>
</table>
<?php
// error massage printing.
if(isset($_SESSION['error'])){
echo  $_SESSION['error'];
session_destroy();
}
?>
</form>
<p class="pqr">NEW USER?<a href="signup.php">sign up</a></p> 
</center>
</div></center>
</body>
</html> 