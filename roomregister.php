<?php
//include auth_session.php file on all user panel pages
include('auth_session.php');
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
   
   <link href="assets/css/dash.css" rel='stylesheet'>
	<link href="../assets/css/roomregister.css" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
   <title>Roomfinder</title>
   <style>
	
/* Style the content */
form{
	align-content:center;
}
.wrapper {
  -webkit-flex: 5;
  -ms-flex: 5;
  flex: 5;
  background-color: #fff;
  padding: 10px;
  margin-top:20px;
  color:black;

}

 
/* Responsive layout - makes the menu and the content (inside the section) sit on top of each other instead of next to each other */
@media (max-width:600px) {
  section {
    -webkit-flex-direction: column;
    flex-direction: column;
  }
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
        <li ><a  href="dashboard.php">Home</a></li>
        <li class ="active"><a href="roomregister.php">Register</a></li>
        <li><a href="list_room.php">Details/Update</a>
        <?php
        if($_SESSION['username']=="admin")
          echo "<li><a href='cmplist.php'>Complain list</a></li>";
       ?>
     </div>
  
    <section class="wrapper" style="margin-left: 16%;margin-top: -22%;">
<!-- <div class="row"> -->			
<div class="col-md-11 col-xs-12 col-sm-12"><br>  	
  	<div class="alert alert-info" role="alert">
  		<?php
			if(isset($errMsg)){
				echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
			}
		?>
  		<h2 class="text-center"><b>Apartment Room</b></h2>
		  <form method="post" action="register_apart.php" enctype="multipart/form-data">
		  	 <div class="row">
		  	 	<div class="col-md-6">
				  <div class="form-group">
				    <label for="apartment_name text-left">fullname</label>
				    <input type="text" class="form-control" id="apartment_name" placeholder="Full Name" name="fullname" required>
				  </div>
				 </div>

				<div class="col-md-6">
				  <div class="form-group">
				    <label for="mobile">Mobile</label>
				    <input type="text" class="form-control" pattern="^(\d{10})$" id="mobile" title="10 digit mobile number" placeholder="10 digit mobile number" name="mobile" required>
				  </div>
				 </div>
			</div>	 


			<div class="row">
		  	 	<div class="col-md-6">
				  <div class="form-group">
				    <label for="email">Email</label>
				    <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
				  </div>
				 </div>

				 <div class="col-md-6">
				  <div class="form-group">
				    <label for="house_number">Home Number</label>
				    <input type="text" class="form-control" id="house_number" placeholder="House Number" name="house_number" required>
				  </div>
				 </div>				 
			</div>
			<div class="row">
			 	<div class="col-md-6">
				  <div class="form-group">
				    <label for="state">State</label>
				    <input type="state" class="form-control" id="state" placeholder="State" name="state" required>
				  </div>
			  	</div>
			  	<div class="col-md-6">
				  <div class="form-group">
				    <label for="city">City</label>
				    <input type="city" class="form-control" id="city" placeholder="City" name="city" required>
				  </div>
			 	 </div>
			</div>

			<div class="row">
				<div class="col-md-6"> 
					<div class="form-group"> 
						<label for="landmark">Landmark</label> 
						<input type="landmark" class="form-control" id="landmark" placeholder="landmark" name="landmark"> 
					</div> 
				</div> 
				<div class="col-md-6"> 
					<div class="form-group"> 
						<label for="rent_price">Rent Price</label> 
						<input type="rent_price" class="form-control" id="rent_price" placeholder="rent_price" name="rent_price" required> 
					</div> 
				</div>
			</div>
			<div class="row">
		  	 	<div class="col-md-6">
				  <div class="form-group">
				    <label for="apartment_name">Apartment Name</label>
				    <input type="text" class="form-control" id="apartment_name" placeholder="Apartment Name" name="apartment_name" required>
				  </div>
				 </div>
				 <div class="col-md-6"> 
					<div class="form-group"> 
						<label for="rooms">No. of Rooms</label> 
						<input type="rooms" class="form-control" id="rooms" placeholder="rooms" name="rooms"> 
					</div> 
				</div> 
			</div>
			<div class="row">
				<div class="col-md-6"> 
					<div class="form-group"> 
						<label for="address">Address</label> 
						<input type="address" class="form-control" id="address" placeholder="Address" name="address" required> 
					</div> 
				</div>
				<!-- <div class="col-md-6"> 
					<div class="form-group"> 
						<label for="user_id">USER ID</label> 
						<input type="user_id" class="form-control" id="user_id" placeholder="User_Id" name="user_id" required> 
					</div> 
				</div> -->
			</div>
			<div class="row">
				<div class="col-md-6"> 
					<div class="form-group"> 
						<label for="accommodation">Accommodation</label> 
						<input type="accommodation" class="form-control" id="accommodation" placeholder="Available_facility" name="accommodation" required> 
					</div> 
				</div>
			</div>


			<div class="row">
				<div class="col-md-6">
				  <div class="form-group">
				    <label for="description">Image</label>
				    <input type="file" name="image" id="image">
				  </div>
				</div>
			</div>

				
			<center>
			 <button type="submit" class="btn btn-primary" name='register_apartment' value="register_apartment">Submit</button></center>
			</form>	
		</div>			
  	</div>
	  </div>
	</div>	
</section>


<!-- </div> -->	

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


        


 