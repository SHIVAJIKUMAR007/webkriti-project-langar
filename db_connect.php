<?php
$db_host="localhost";
$db_user="id13011202_root";
$db_pass="shivaji2001";

if($con =mysqli_connect($db_host,$db_user,$db_pass)){
  if($db_sel= mysqli_select_db($con,"id13011202_langar"));
    // echo "database selected";
 
  else
  echo  "database not selected";
  
}
else
echo  "database not connected";
?>
