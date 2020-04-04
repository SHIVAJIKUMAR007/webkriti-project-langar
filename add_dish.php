<?php
ob_start();
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title> Add Your New Dish Here R1</title>
        <meta name="description" content="Try our best 24 hours food delivery service in Gwalior.  Order Indian, South Indian, Chinese food in Gwalior city. We also deliver the best quality of food in Train.">
<meta name="keywords" content="24 hours online food delivery services in Gwalior, Food delivery in the train, Online food in the train, online food delivery in Gwalior, food delivery in Gwalior, food in train, order food in the train, online food delivery in the train, railway food delivery, food delivery at Gwalior railway station.">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body style="padding-bottom:50px;background-image: url('https://wallpaperplay.com/walls/full/1/6/2/93324.jpg')">

        <div style="float: left;">
            <a href="index.html"><img src="https://1.bp.blogspot.com/-XH2Bombqg8E/XlC5QTkZvuI/AAAAAAAAAQ4/IHJmZda6tEoed70j1HN_t_T5luccg4e8QCNcBGAsYHQ/s200/logo.jpg.jpeg" style="margin: 10px; height: 100px;"></a>
        </div>

        <marquee behavior="scroll side" direction="right"><h3 style="color:red;" >Hello!</h3></marquee>

        <center><h1 style="color:white; font-weight:bold;">ADD YOUR NEW DISH HERE</h1></center>
<center><div style="padding-bottom:30px; width:300px;margin-top: 5%; margin-left:0%; align-content: center; background-color: rgba(0, 0, 0, 0.8); border: 2px solid black; border-radius: 20px;">
    <form action="upload_dish.php" method="POST" enctype="multipart/form-data">
        <input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 50px;" type="text" name="rid" placeholder="Enter Your Restaurant ID " required>        
        <input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 50px;" type="text" name="name" placeholder="Name Of The Dish " required>
        <input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 30px;" type="number" name="price"  placeholder="Price" required>                      
     <input style="padding: 5px; border: 1px solid rgb(126, 8, 126);border-radius: 5px; margin-top: 30px;" type="text" name="tagline"  placeholder="Tagline" required>
       <br><br><br>
     <h5 style="margin: 0px 25px 0px 24px; padding:0px;background-color: skyblue;">Upload Image</h5>
      <input type="file" accept="image/*" name="image" placeholder="upload image" 
            style="background-color: teal; padding: 0px;border: 1px solid black;cursor: pointer;" 
            required>
     <input style="margin-top: 50px; padding-left: 20%; padding-right: 20%; border: 0px solid rgb(8, 1, 8);border-radius: 5px; height: 30px; background-color: mediumspringgreen;" type="submit" >
    </form>

     </div></center>
    </body>
</html>