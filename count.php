<?php
 $server="localhost";
 $username="root";
 $password="";
 $dbname = "roomfinder";
 
 $con=mysqli_connect($server,$username,$password,$dbname);
  

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

$selected=mysqli_select_db($con,"roomfinder");

$result = mysqli_query($con,"select count(1) FROM users");
$row = mysqli_fetch_array($result);

$total = $row[0];
?>