
<?php
  require 'config/config.php';
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ROOMFINDER</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="assets/css/rent.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" style=" font-family: Sofia; font-style:Italic" href="index1.php">ROOM FINDER</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
           
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#search">Search</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="register.php">Register</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contact/contactus.html">Contact</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#team">Team</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To ROOM FINDER</div>
          <div class="intro-heading text-uppercase">It's Nice To See You<br></div>
        </div>
      </div>
    </header>

     <!-- Search -->
    <section id="search">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Search</h2>
            <h3 class="section-subheading text-muted">Search rooms or homes for hire.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <form action="" method="POST" class="center" novalidate>
              <div class="row">
                <div class="col-md-9">
                  <div class="form-group">
                    <input class="form-control"   name="search" type="text" placeholder="Key words(1bhk,2bhk,Bhopal,....)" required data-validation-required-message="Please enter keywords">
                    <p class="help-block text-danger"></p> 
                  </div>
                </div>

                <!-- <div class="col-md-4"> 
                  <div class="form-group">
                    <input class="form-control" id="location" type="text" name="loation" placeholder="Location" required data-validation-required-message="Please enter location.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>    -->     

                <div class="col-md-3">
                  <div class="form-group">
                    <button id="" class="btn btn-success btn-md text-uppercase" name="search" row="search" type="submit">Search</button>
                  </div>
                </div>
              </div>
            </form>

            <?php
              if(isset($errMsg)){
                echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
              }
            ?>        
            <?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "roomfinder";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['search'])){
    $searchq = $_POST['search'];
    $searchq = preg_replace("#[^0-9a-z]#i","","$searchq");
    $query = mysqli_query($conn, "SELECT * FROM room_rental_registrations_apartment WHERE rooms LIKE '%$searchq%' OR city LIKE '%$searchq%'") or die("could not search!");
    $count = mysqli_num_rows($query);
    if($count==0){
        echo "Not found any data";
    }else{
        while($row = mysqli_fetch_array($query)){
           
                  echo '<div class="card card-inverse card-info mb-3" style="padding:1%;">          
                        <div class="card-block">';
                         echo   '<div class="row">
                            <div class="col-4">
                            <h4 class="text-center">Owner Details</h4>';
                              echo '<p><b>Owner Name: </b>'.$row['fullname'].'</p>';
                              echo '<p><b>Mobile Number: </b>'.$row['mobile'].'</p>';
                          
                              echo '<p><b>Email: </b>'.$row['email'].'</p>';
                              echo '</p><p><b> State: </b>'.$row['state'].'</p><p><b> City: </b>'.$row['city'].'</p>';
                              ?><img src="uploads/<?php echo $row['image']; ?>" alt="" width="200px" height="100px"><?php
										

                              echo '<p><b>Address: </b>'.$row['address'].'</p><p><b> Landmark: </b>'.$row['landmark'].'</p>';

                          echo '</div>
                            <div class="col-5">
                            <h4 class="text-center">Room Details</h4>';
                              // echo '<p><b>Country: </b>'.$row['country'].'<b> State: </b>'.$row['state'].'<b> City: </b>'.$row['city'].'</p>';
                              echo '<p><b>House Number: </b>'.$row['house_number'].'</p>';

                            
                                if(isset($row['apartment_name']))                         
                                  echo '<div class="alert alert-success" role="alert"><p><b>Apartment Name: </b>'.$row['apartment_name'].'</p></div>';


                              echo '<p><b>Available Rooms: </b>'.$row['rooms'].'</p>';
                              echo '<p><b>Address: </b>'.$row['address'].'</p><p><b> Landmark: </b>'.$row['landmark'].'</p>';
                          echo '</div>
                            <div class="col-3">
                            <h4>Other Details</h4>';
                            echo '<p><b>Accommodation: </b>'.$row['accommodation'].'</p>';
                              if($row['vacant'] == 0){ 
                                echo '<div class="alert alert-danger" role="alert"><p><b>Occupied</b></p></div>';
                              }else{
                                echo '<div class="alert alert-success" role="alert"><p><b>Vacant</b></p></div>';
                              } 
                            echo '</div>
                          </div>              
                         </div>
                      </div>';
                }
              }
   }
              ?>              
          </div>
        </div>
      </div>
      <br><br><br><br>
    </section>    

     <!-- about us -->

     <section class="page-section bg-light" id="about">
        <div class="container-fluid">

            <h2 class="text-center text-capitalize pt-5">About Us</h2>
            <hr class="w-25 mx-auto pb-5">

            <div class="row">
                <div class="col-lg-6 col-md-6 col-12">
                    <img src="images/aboutus.jpg" class="img-fluid">
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <h1>Who am I?</h1>
                    <hr>
                    <p>If you are a stranger in some city and want to rent house than it is difficult to find suitable
                        house in time. This is the main motivation behind *Room FindeR* project development.
                        An online web portal to manage the rental property, facilitate tenants to view all listed
                        property, search for their need using key words such as property type, location etc. Landlords
                        need to have provision to post /update their property details with admin approval. Besides they
                        required feature that would enable the tenant to view the complete details of the property,
                        shortlist their preferred and register to book for a site visit. Member registration form and
                        inquiry form to contact the admin for marketing are required in the application. Registered
                        members must be provision to book for a site visit, view their recently viewed, site visits as
                        well as reviewed sites in their member account.

                    </p>
                    <button class="btn bg-primary text-white">Wanna know me</button>
                </div>
            </div>
        </div>

    </section>

    <!-- About us End -->

                <!-- Team-->
 <section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">We are here only for you.</h3>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="images/admin1.jpg" alt="" />
                    <h4>AditYa Raj SinGh</h4>
                    <p class="text-muted">Lead Developer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fa fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/a.r.s.5983"><i class="fa fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="images/admin2.jpg" alt="" />
                    <h4>Amit Kumar mandal</h4>
                    <p class="text-muted">Lead Marketer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fa fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="https://www.facebook.com/profile.php?id=100008476833231"><i class="fa fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>
             <div class="col-lg-4">  
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="images/admin3.jfif" alt="" />
                    <h4>Shailendra Singh Pawar</h4>
                    <p class="text-muted">Lead Designer</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fa fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fa fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fa fa-linkedin"></i></a>
                </div>
            </div>-->
        </div>
    </div>
</section>




    <!-- Team process End -->



    <!-- Footer -->
    <footer style="background-color: #ccc;">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Your Website 2020</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
   
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