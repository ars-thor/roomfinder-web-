<?php
//include auth_session.php file on all user panel pages
include('auth_session.php');
?>

<?php
 $insert = false;
if(isset($_POST['cmp'])){   
 $server="localhost";
 $username="root";
 $password="";
 $dbname = "roomfinder";
 
 $con=mysqli_connect($server,$username,$password,$dbname);
 


 if(!$con){
     die("failed due to :".mysqli_connect_error());
}

 $apartment_name=$_POST['apartment_name'];
 $username=$_SESSION['username'];
 $fullname=$_POST['name'];
 $cmp=$_POST['cmp'];

//  $result= mysqli_query($con,"SELECT * FROM room_rental_registrations_apartment WHERE id='" . $_GET['id'] . "'") ;
//  $row= mysqli_fetch_array($result);
  
 
$sql="INSERT INTO `roomfinder`.`cmps`(`apartment_name`, `cmp`, `username`, `fullname`) VALUES ('$apartment_name','$cmp','$username','$fullname')";
if($con->query($sql)==true){

    $insert = true;
    
    echo "<script>
    alert('Your Complain is sucessfully registered');
    window.location.href='dashboard.php';  
    </script>";
    
    exit;
    // prompt("cjhk");
}
else{
    echo "ERROR: $sql <br> $con->error";

    echo"yes this one";
}

// $con->close();
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
          <h1 style="margin-top:-40px;"><a href="index1.php">Logout</a></h1>
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
  
  <section class="wrapper" style="margin-left: 14%;margin-top: -16%;">
<!-- <div class="row"> -->			
<div class="col-md-11 col-xs-12 col-sm-12"><br>  	
    <div class="alert alert-info" role="alert">
        <?php
          if(isset($errMsg)){
              echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
    }
    

    
      ?>
        <h2 class="text-center"><b>Apartment Room Complain</b></h2>
        <h6 class="text-center"><b>Describe your Complain</b></h6><br>
          
      <form method="post" action="complaint.php" enctype="multipart/form-data">
      
             <div class="row">
                 <div class="col-md-6">
                <div class="form-group">
                  <label for="apartment_name text-left"><h4><b>full Name:</b></h4></label>
                  <!-- <input type="text" class="form-control" rows="5" id="apartment_name" name="apartment_name"></textarea> -->
                  <input type="text" class="form-control" id="name" placeholder="Apartment Name" name="name" value="<?php echo $_GET['name']; ?>" required>
                </div>
                </div>
               </div><br>

               

               <div class="row">
                 <div class="col-md-6">
                <div class="form-group">
                  <label for="apartment_name text-left"><h4><b>Apartment Name:</b></h4></label>
                  <!-- <input type="text" class="form-control" rows="5" id="apartment_name" name="apartment_name"></textarea> -->
                  <input type="text" class="form-control" id="apartment_name" placeholder="Apartment Name" name="apartment_name" value="<?php echo $_GET['apartment_name']; ?>" required>
                                   
                  <!-- <input type="text" class="form-control" id="fullname" placeholder="Full Name" name="fullname" value="<?php echo $row['fullname']; ?>" required> -->
                </div>
                </div>
               </div><br>

               
               <div class="row">
                 <div class="col-md-6">
                <div class="form-group">
                  <label for="apartment_name text-left"><h4><b>Write your Complain here:</b></h4></label>
                  <textarea class="form-control" rows="5" id="cmp" name="cmp"></textarea>
                  
                </div>
                </div>
               </div>
            <div class="row">
                 <div class="col-md-6">
                <div class="form-group">
                <button type="submit" class="btn btn-primary"   href='#' name='complain_apartment' value="complain_apartment">Submit</button>
                </div>
               </div>
          </form>	
                  
    </div>
    </div>
  </div>	
</section>























    