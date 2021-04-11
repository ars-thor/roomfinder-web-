<?php
//include auth_session.php file on all user panel pages
include('auth_session.php');
?>
<?php
$server="localhost";
$username="root";
$password="";
$dbname = "roomfinder";

$conn=mysqli_connect($server,$username,$password,$dbname);
 // Check connection
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
 

		?>
<!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <!-- Bootstrap core CSS -->
	 <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
   
   <link href="assets/css/dash.css" rel='stylesheet'>
   <link href="../assets/css/rent.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
   <title>Roomfinder</title>

 	<style>
		
			.accom p {
  position: relative;
  font-size: 14px;
  color: black;
  overflow-wrap: break-word;
  width: 250px; /* Could be anything you like. */
}

.accom p {
  position: relative;
  display: inline-block;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 4em; /* (Number of lines you want visible) * (line-height) */
  line-height: 1em;
  text-align:justify;
}

.accom p::after {
  content: "..."; 
  position: absolute;
  right: -12px; 
  bottom: 4px;
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
          <h1 style="margin-top:-50px;"><a href="index1.php">Logout</a></h1>
        </div>
          
      </div>

   

   <div class="menu">
      <ul>
        <li ><a href="dashboard.php">Home</a></li>
        <li><a href="roomregister.php">Register</a></li>
        <li class ="active"><a href="list_room.php">Details/Update</a>
        <?php
        if($_SESSION['username']=="admin")
          echo "<li><a href='cmplist.php'>Complain list</a></li>";
       ?>
     </div>

	 <section class="wrapper" style="margin-left: 16%;margin-top: -23%;">
	<div class="container" style="color: blue">
		<div class="row">
			<div class="col-12">
			<?php
				if(isset($errMsg)){
					echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
				}
			?>
			<h2 style="margin: 50px"><button class="button"><b>List of Apartment Details</b></button></h2>
				<?php 
				

							$sql = 'SELECT  id,fullname, mobile, email,state,city,image,address,landmark,house_number,apartment_name,rooms,accommodation ,vacant FROM room_rental_registrations_apartment';
						$result = mysqli_query($conn, $sql);
						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {

						echo '<div class="card card-inverse card-info mb-3" style="padding:1%;">					
								  <div class="card-block">';
								  echo '<a class="btn btn-warning float-right" href="update.php?id='.$row['id'].'">Edit</a>';
								  echo 	'<div class="row">
											<div class="col-4">
											<h4 class="text-center ">Owner Details</h4>';
											 	echo '<p><b>Owner Name: </b>'.$row['fullname'].'</p>';
											 	echo '<p><b>Mobile Number: </b>'.$row['mobile'].'</p>';
										
											 	echo '<p><b>Email: </b>'.$row['email'].'</p>';
											 	echo '</p><p><b> State: </b>'.$row['state'].'</p><p><b> City: </b>'.$row['city'].'</p>';
												

												
												/*if ($row['image'] !== 'uploads/') {*/
													
																						
													?><img src="uploads/<?php echo $row['image']; ?>" alt="" width="200px" height="100px"><?php
										

											 	echo '<p><b>Address: </b>'.$row['address'].'</p><p><b> Landmark: </b>'.$row['landmark'].'</p>';

										echo '</div>
											<div class="col-5">
											<h4 class="text-center">Room Details</h4>';
												echo '<p><b>House Number: </b>'.$row['house_number'].'</p>';

																			
												
													if(isset($row['apartment_name']))
														echo '<div class="alert alert-success" role="alert"><p><b>Apartment Name: </b>'.$row['apartment_name'].'</p></div>';

											
												echo '<p><b>Available Rooms: </b>'.$row['rooms'].'</p>';
											
										echo '</div>
											<div class="col-3 accom">
											<h4>Other Details</h4>';
											echo '<p><b>Accommodation: </b><br>'.$row['accommodation'].'</p></br>';
											
												if($row['vacant'] == 0){ 
													echo '<div class="alert alert-danger" role="alert"><br><p><b>Occupied</b></p></div>';
												}else{
													echo '<div class="alert alert-success" role="alert"><p><b>Vacant</b></p></div>';
												} 
											echo '</div>
										</div>				      
								   </div>
								</div>';
								echo '<a class="btn btn-warning float-right" href="complaint.php?id='.$row['id'].'&name='.$row['fullname'].'&apartment_name='.$row['apartment_name'].'">Complaint</a><br><br>';
								        echo $row['id'];
							}
					}
					
				?>				
			</div>
		</div>
	</div>	
</section>
					 
					 
    <!-- Bootstrap core JavaScript -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/plugins/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="assets/js/rent.js"></script>
     
 </body>
 </html>