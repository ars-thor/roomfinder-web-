<?php

include('auth_session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roomfinder";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$fullname=$_POST['fullname'];
$moblie = $_POST['mobile'];
$email = $_POST['email'];
$state = $_POST['state'];
$city = $_POST['city'];
$landmark = $_POST['landmark'];
$rent_price=$_POST['rent_price'];
$apartment_name = $_POST['apartment_name'];
$rooms=$_POST['rooms'];
$address = $_POST['address'];
$user_id=$_POST['user_id'][$key];
$accommodation=$_POST['accommodation'];
$image = $_FILES['image']['name'];



				//upload an images
				$target_file = "";
				if (isset($image)) {
					
					$target_file = "uploads/".basename($_FILES["image"]["name"]);
					$uploadOk = 1;
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
				
						move_uploaded_file($_FILES["image"]["tmp_name"], "uploads/" . $_FILES["image"]["name"]);
						$uploadOk = 1;
				 
				}			
				//end of image upload





$sql = "INSERT INTO room_rental_registrations_apartment(fullname, mobile, email, state, city,landmark,rent_price,apartment_name,rooms,address,accommodation,image)

VALUES ('$fullname','$moblie','$email','$state','$city','$landmark','$rent_price','$apartment_name','$rooms','$address','$accommodation','$image');";
$executecmd=mysqli_query($conn, $sql);
if ($executecmd===TRUE) {

  ?>
  <script>
    alert("Register Successfully");
    window.location.href='dashboard.php';
  </script>
  <?php
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>