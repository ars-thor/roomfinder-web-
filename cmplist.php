<?php
//include auth_session.php file on all user panel pages
 include('auth_session.php');
?>

<?php 
 $servername='localhost'; 
$user = 'root'; 
$password = '';  
$database = 'roomfinder';  
  

$mysqli =  mysqli_connect('localhost', 'root', '', 'roomfinder');


if ($mysqli->connect_error) { 
    die('Connect Error (' .  
    $mysqli->connect_errno . ') '.  
    $mysqli->connect_error); 
} 
  


$sql = "SELECT * FROM cmps ORDER BY cmp DESC "; 
$result = $mysqli->query($sql); 
$mysqli->close();  
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>App</title>

    <!-- Bootstrap core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="../assets/css/rent.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
  </head>
  <body id="page-top">
	<!-- Header nav -->	

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
   <style>
     th{
       color:blue;
     }
   </style>
 </head>
 <body>

    <div class="top">

        <div class ="left_div">
          <h1 style=" font-family: Sofia;">ROOM FINDER<h1> 
        </div>

        <!--  <div style="float:right; right:0; margin-right:50px;" class="name_plate">
          -->

        <div class="right_div">
        <h2 style="margin-right:150px;" ><?php echo $_SESSION['username']; ?></h2>
          <h1 style="margin-top:-40px;"><a href="index1.php">Logout</a></h1>
        </div>
          
      </div>

   

   <div class="menu">
      <ul>
        <li ><a   href="dashboard.php">Home</a></li>
        <li><a href="roomregister.php">Register</a></li>
        <li><a href="list_room.php">Details/Update</a>
        <?php
        if($_SESSION['username']=="admin")
          echo "<li class ='active'><a href='cmplist.php'>Complain list</a></li>";
       ?>
     </div>
     
 </body>
 </html>

<section class="wrapper" style="margin-left: 16%;margin-top: -23%; ">
	<div class="container">
		<div class="row">
			<div class="col-12">
						<h2 style="margin-top:110px; color:blue ">List of Complaint Details</h2>

            
             
 

				<table border ="1px" width="80%">
        <thead><tr>
        <th>Sr no.</th>
        <th>Apartment/Room</th>
        <th>Complaints</th>
        <th>Owner Name</th>
        <th>user Name</th>
        </tr>    
        </thead>    
        <tbody> 
   




        <?php    $i=1;
                while($rows=$result->fetch_assoc()) 
                { 
             ?> 
                 
                <td style="color:black "><?php echo $i.".";?></td> 
                <td style="color:black "><?php echo $rows['apartment_name'];?></td> 
                <td style="color:black "><?php echo $rows['cmp'];?></td> 
                <td style="color:black "><?php echo $rows['fullname'];?></td> 
                <td style="color:black "><?php echo $rows['username'];?></td> 
               <?php $i=$i+1;?>
                </tr> </tbody>
            <?php 
                } 
             ?> 
        </table> 






        </table>				
			</div>
		</div>
	</div>	
</section>
    <!-- Bootstrap core JavaScript -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="../assets/plugins/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="../assets/js/jqBootstrapValidation.js"></script>
    <script src="../assets/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="../assets/js/rent.js"></script>
  </body>
</html>
