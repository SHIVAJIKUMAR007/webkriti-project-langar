<!DOCTYPE html>
<html>
<head>
<title>sign up</title>
<meta name="description" content="Try our best 24 hours food delivery service in Gwalior.  Order Indian, South Indian, Chinese food in Gwalior city. We also deliver the best quality of food in Train.">
<meta name="keywords" content="24 hours online food delivery services in Gwalior, Food delivery in the train, Online food in the train, online food delivery in Gwalior, food delivery in Gwalior, food in train, order food in the train, online food delivery in the train, railway food delivery, food delivery at Gwalior railway station.">
<style>
body
{
background-image : url('https://1.bp.blogspot.com/-o3vdO5nOwFU/XlFviZAB_LI/AAAAAAAAARE/681CriNh4Ow4BaTFQap4BxCGr3okfHIkwCNcBGAsYHQ/s640/signup.jpeg');
background-repeat : no-repeat;
background-attachment: fixed; 
background-size: cover;
height: 100%;
}
.signup
{
    width: 30%;
	min-width: 350px;
	background: rgb(90, 9, 9);
	color: #fff;
	top:85%;
	left:50%;
	position: absolute;
	transform: translate(-50%,-50%);
	box-sizing: border-box;
	padding: 40px 30px;
	border-radius:20px;
	margin-bottom: 30px;
	display: flex;
	flex-direction: column;
}
}
.signup label{
	margin: 0;
	padding: 0;
	font-weight: bold;
}
.signup input{
	margin-bottom: 20px;
}
.signup input[type="text"],input[type="email"], input[type="password"] 
{
    border: none;
	border-bottom: 1px solid #fff;
	background: transparent;
	outline: none;
	height: 40px;
	color: #fff;
	font-size: 16px;
	width: 100%;

}
.signup button
{
    border: none;
	outline: none;
	height: 40px;
	background: #189ec7;
	color: #fff;
	font-size: 18px;
	border-radius: 30px;
}
.signup button:hover
{
	cursor: pointer;
	background: #ffc107;
	color: #000;
}
</style>
<script>

function validation()
{
	var result=true;
	var i=document.getElementsByTagName("input");
	if(i[5].value.length<=6 ||){
		result=false;
		alert("password must be greater than 6 digit");
	}
	else if(i[5].value!=i[6].value)
	{
	var result=false;
	alert("password must be same to conform password");
	
	}
	return(result);
	
}

</script>
</head>

<body>
<!-- connectinon of db -->
<!-- <?php include_once('db_connect.php');  ?> -->

<div dir="ltr" style="text-align: left;" trbidi="on">
<div class="separator" style="clear: both; text-align: center; position: absolute;">
<a href="index.html"><img border="0" data-original-height="424" data-original-width="520" height="162" src="https://1.bp.blogspot.com/-XH2Bombqg8E/XlC5QTkZvuI/AAAAAAAAAQ4/IHJmZda6tEoed70j1HN_t_T5luccg4e8QCNcBGAsYHQ/s200/logo.jpg.jpeg" style=" margin:10px; height : 150px; width : 150px;  ;"/></a></div>
<center><h1 style=" color: rgb(238, 238, 16); text-align: center;">
&nbsp; <span style="font-size:70px;">&nbsp; WELCOME TO LANGAR</span></h1></center>
<h2 style="text-align: center; color:rgb(21, 180, 34);">
<span style="font-size:25px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;ZOMATO SE ACHHA, SWIGGY SE BEHTAR</span></h2>
<div style=" text-align: right; margin-right: 50px;">
<span style="font-size: 15px;  margin-right:50px; font-size: 30px;  ">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<a href="index.html" style="color: rgb(32, 176, 233); text-decoration: none;">HOME</a>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;<a href="login.php" style="color: rgb(18, 182, 223);  text-decoration: none;">LOGIN</a></span></div>
</div>
    <form method="post" action="register.php"  onsubmit="return validation()">
		<div class="signup">
		<h1 style="text-align: center;">SIGN UP</h1>
	
			<label>Username :
                <br><br>
                <input type="text" name="username" placeholder="Enter Username" required>
            </label><br>

            <label>Email :
                <br><br>
                <input type="email" name="email" placeholder="Enter Email" required>
            </label><br>

            <!-- <label>Gender : 
                <br><br>
               <input type="radio" name="gender" value="male" checked> Male
               <input type="radio" name="gender" value="female"> Female<br>
            </label> -->
			
			<label>Password :
                <br><br>
                <input type="Password" name="pass" placeholder="Enter Password Greater than 6 digits" required>
            </label><br>
			
			<label>Confirm Password :
                <br><br>
                <input type="Password" name="confirm" placeholder="Re-enter Password" required>
            </label><br>
			<label>Contact Number :<br><br>
            <input type="text" name="contact" placeholder="Enter Your Phone Number" required>
        </label><br>
			<button type="submit">submit</button>
			
			<!-- <input type="submit"> -->
		
</div>
</form>
</div>
</body>
</html>