<?php 
  //creating connection to database
$con=mysqli_connect("localhost","root","","roomfinder") or die(mysqli_error());
  //check whether submit button is pressed or not
if((isset($_POST['submit'])))
{
  //fetching and storing the form data in variables
$fname= $con->real_escape_string($_POST['fname']);
$lname = $con->real_escape_string($_POST['lname']);
$email = $con->real_escape_string($_POST['email']);
$comment = $con->real_escape_string($_POST['comment']);


  //query to insert the variable data into the database
$sql="INSERT INTO contact (fname, lname,email,comment) VALUES ('".$fname."','".$lname."', '".$email."', '".$comment."')";
  //Execute the query and returning a message
if(!$result = $con->query($sql)){
die('Error occured [' . $conn->error . ']');
}
else
  ?>
   <!-- echo "Thank you! We will get in touch with you soon"; -->
   <script>
    alert("Thank you! We will get in touch with you soon");
    window.location.href='http://localhost/roomfinder/index1.php';
  </script>
  <?php
}

?>