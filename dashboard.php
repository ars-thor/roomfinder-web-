<?php

include('auth_session.php');
include('count.php');
include('countroom.php');


?>
<?
$servername='localhost'; 
$user = 'root'; 
$password = '';  
$db = 'roomfinder';  
  

$con = mysql_connect("servername","user","password");
if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("db", $con);
 $result = mysql_query("select count(*) FROM users AS register_user");
 $row = mysql_fetch_array($result);
 
 $total = $row[0];

 mysqli_close($conn);
?>
<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
   
   <link href="assets/css/dash.css" rel='stylesheet'>
   <link href="../assets/css/rent.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
   <title>Roomfinder</title>
 </head>
 <body>

    <div class="top">

        <div class ="left_div">
          <h1 style=" font-family: Sofia;">ROOM FINDER<h1> 
        </div>
        <div class="right_div">
        <h2 style="margin-right:150px;" ><?php echo $_SESSION['username']; ?></h2>
          <h1 style="margin-top:-40px;"><a href="index1.php">Logout</a></h1>
        </div>
          
      </div>

   

   <div class="menu">
      <ul>
        <li class ="active"><a   href="dashboard.php">Home</a></li>
        <li><a href="roomregister.php">Register</a></li>
        <li><a href="list_room.php">Details/Update</a>
        <?php
        if($_SESSION['username']=="admin")
          echo "<li><a href='cmplist.php'>Complain list</a></li>";
       ?>
     </div>

     <section class="wrapper" style="margin-left: 16%;margin-top: -18%;"> 
		
				<div class="col-md-12">
          <h1  style="margin : 30px; color:black; font-size :40px">DASHBOARD</h1>
        <?php
          if($_SESSION['username']=="admin"){
            ?>
          <h1 ><a href="users.php"><button class="button"><?php echo "Total user: " . $total; ?></button></a></h1>
       <?php
          }
        ?>
          <h1 ><a href="list_room.php"><button class="button"><?php echo "Total registered apartment : " . $totalroom; ?></button></a></h1>
					<div class="row">						
					
					</div>
				</div>
	</section> 
 </body>
 </html>