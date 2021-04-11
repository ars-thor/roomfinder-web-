<?php

include('auth_session.php');
?>
<?php
$server="localhost";
$username="root";
$password="";
$dbname = "roomfinder";

$conn=mysqli_connect($server,$username,$password,$dbname);
 
 if (!$conn) {
   die("Connection failed: " . mysqli_connect_error());
 }
 
 if(count($_POST)>0) {

  mysqli_query($conn ,"UPDATE room_rental_registrations_apartment set id = '" . $_POST['id'] . "', fullname = '" . $_POST['fullname'] . "', mobile ='" . $_POST['mobile'] . "' ,email = '" . $_POST['email'] . "', house_number ='" . $_POST['house_number'] . "', state = '" . $_POST['state'] . "', city ='" . $_POST['city'] . "', landmark = '" . $_POST['landmark'] . "', rent_price = '" . $_POST['rent_price'] . "', apartment_name = '" . $_POST['apartment_name'] . "', rooms = '" . $_POST['rooms'] . "', address = '" . $_POST['address'] . "', accommodation = '" . $_POST['accommodation'] . "',  vacant = '" . $_POST['vacant'] . "'  WHERE id = '" . $_POST['id'] . "'");
   $message = "Record Modified Successfully";

}			
$result = mysqli_query($conn,"SELECT * FROM room_rental_registrations_apartment WHERE id='" . $_GET['id'] . "'");
$row= mysqli_fetch_array($result);
    
/* if(isset($_GET['action']) && $_GET['action'] == 'reg') {
	// $errMsg = 'Update successfull. Thank you';
}*/


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
  width: 250px;
}

.accom p {
  position: relative;
  display: inline-block;
  word-wrap: break-word;
  overflow: hidden;
  max-height: 4em; 
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
	 <section class="wrapper" style="margin-left: 16%;margin-top: -22%;">

     <div class="col-md-11 col-xs-12 col-sm-12"><br>  	
  	<div class="alert alert-info" role="alert">
  		<?php
			if(isset($errMsg)){
				echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
			}
		?>
  		<h2 class="text-center">Apartment Room</h2>
  		<form action="" method="POST">
		  <div><?php if(isset($message)) { echo $message; } ?>
				</div>
		  	 <div class="row">
		  	 	<div class="col-md-6">
			  	  <div class="form-group">
				    <label for="fullname">Full Name</label>
				     <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>">
				    <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" value="<?php echo $row['fullname']; ?>" required>
				  </div>
				 </div>

				<div class="col-md-6">
				  <div class="form-group">
				    <label for="mobile">Mobile</label>
				    <input type="text" class="form-control" pattern="^(\d{10})$" id="mobile" title="10 digit mobile number" placeholder="10 digit mobile number" name="mobile" value="<?php echo $row['mobile']; ?>" required>
				  </div>
				 </div>

			
			</div>

			<div class="row">
		  	 	<div class="col-md-6">
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $row['email']; ?>" required>
				  </div>
				 </div>
				 <div class="col-md-6">
				  <div class="form-group">
				    <label for="house_number">House Number</label>
				    <input type="text" class="form-control" id="house" placeholder="House Number" name="house_number" value="<?php echo $row['house_number']; ?>" required>
				  </div>
				 </div>

		
				 </div>
			<div class="row">
				 <div class="col-md-6">
				  <div class="form-group">
				    <label for="apartment_name">Apartment Name</label>
				    <input type="text" class="form-control" id="apartment_name" placeholder="Apartment Name" name="apartment_name" value="<?php echo $row['apartment_name']; ?>" required>
				  </div>
				 </div>

				 <div class="col-md-6">
				 <div class="form-group">
				    <label for="rooms">Rooms</label>
				    <input type="text" class="form-control" id="rooms" placeholder="Rooms" name="rooms" value="<?php echo $row['rooms'] ?>" required>
				  </div>
				</div>
			</div>

			<div class="row">
		
			  <div class="col-md-6">
			  <div class="form-group">
			    <label for="state">State</label>
			    <input type="state" class="form-control" id="state" placeholder="State" name="state" value="<?php echo $row['state'] ?>" required>
			  </div>
			  </div>
			  <div class="col-md-6">
			  <div class="form-group">
			    <label for="city">City</label>
			    <input type="city" class="form-control" id="city" placeholder="City" name="city" value="<?php echo $row['city'] ?>" required>
			  </div>
			  </div>
			 </div>
			 
			 <div class="row">
			 	<div class="col-md-6">
				 <div class="form-group">
				    <label for="rent_price">Rent</label>
				    <input type="rent_price" class="form-control" id="rent_price" placeholder="Rent" name="rent_price" value="<?php echo $row['rent_price']; ?>">
				  </div>
				</div>
				
			  <div class="col-md-6">
			  <div class="form-group">
			    <label for="landmark">Landmark</label>
			    <input type="landmark" class="form-control" id="landmark" placeholder="landmark" name="landmark" value="<?php echo $row['landmark']; ?>">
			  </div>
			   </div>
			   </div>
			   <div class="row">
			  <div class="col-md-6">
			  <div class="form-group">
			    <label for="address">Address</label>
			    <input type="address" class="form-control" id="address" placeholder="Address" name="address" value="<?php echo $row['address']; ?>" required>
			  </div>
			   </div>
			   <div class="col-md-6">
			  <div class="form-group">
			 <label for="accommodation">Accommodation</label>
			<input type="accommodation" class="form-control" id="accommodation" placeholder="Accommodation" name="accommodation" value="<?php echo $row['accommodation']; ?>" required>
			  </div>
			   </div>
		 </div>
			  
			 <div class="row">
			    <div class="col-6">
			 		 <div class="form-group">
					    <label for="vacant">Vacant/Occupied</label>
					    <select class="form-control" id="vacant" name="vacant">
					      <option value="1" <?php if($row['vacant'] == '1'){echo 'selected';}?>>Vacant</option>
					      <option value="0" <?php if($row['vacant'] == '0'){echo 'selected';}?>>Occupied</option>
					    </select>
					  </div>
			 	</div>

			  <button type="submit" class="btn btn-primary" name='submit' value="Submit">Submit</button>
			  </div>
			  </div>
			</form>	
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