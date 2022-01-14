<?php

include("config.php");

session_start();

if(!isset($_SESSION["userType"]))
{
    header("location:../login.php");
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>Add Provost</title>
  </head>
  <body>


    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="home.php" class="text-white mb-0"><strong>N<span style="color:red;">C</span>R</strong></a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
              <li><a href="home.php"><span>Home</span></a></li>
              <li><a href="user.php"><span>SignUp</span></a></li>
                <li class="has-children">
                  <a href=""><span>Users</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="faculty.php">Faculty Member(s)</a>
                      <ul>
                    <li><a href="director.php">Director(s)</a></li>
                    <li><a href="addProvost.php">Provost(s)</a></li>
                  </ul>
                  </li>
                  <li><a href="addSectionOfficer.php">Section_Officer(s)</a></li>
                  </ul>
                </li>

               <li class="has-children">
                  <a href=""><span>Sectors</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="addDepartment.php">Department(s)</a></li>
                    <li><a href="Hall.php">Hall(s)</a></li>
                  </ul>
                </li>

                <li><a href="termfee.php"><span>Term Fee</span></a></li>
                <li><a href="feedback.php"><span>Feedback</span></a></li>
                <li><a href=""><span>Profile</span></a></li>
                <li><a href="logout.php"><span>Log out</span></a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>

        </div>
      </div>
      
    </header>

     <div class="hero" style="background-image: url('images/nstu.jpg');"></div> 
  





    <!-- List -->


    <br><br>
  <div class="col-md-12">
  <div class="container">
    <div class="card text-center">
    <div class="card-header">
      <h5 style="float: left;"></h5>
    </div>
    <div class="card-body">
      <h2 class="ti"><strong>Provost</strong></h2>
      <table class="table">
        
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Dept. Id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
        <th scope="col">Hall Name</th>
        
      </tr>
    </thead>
    <tbody>

      <?php
      include("config.php");
      // $con = mysqli_connect("localhost", "root","","multiuser") or die ("Connection Failed");
      $i = 0;
          // $sel="SELECT * FROM courses ORDER BY dept_id ASC";
          $sel = "SELECT fm.*, h.hall_name
          FROM faculty_members fm, hall h
          WHERE h.id=fm.member_id";

          $Q=mysqli_query($con,$sel);
          while($data=mysqli_fetch_assoc($Q)){
      ?>
      <tr>
        <th scope="row"><?php echo ++$i; ?></th>
        <td><?= $data['name']; ?></td>
        <td><?= $data['dept_id']; ?></td>
        <td><?= $data['username']; ?></td>
        <td><?= $data['email']; ?></td>
        <td><?= $data['password']; ?></td>
        <td><?= $data['hall_name']; ?></td>
        
      </tr>

    <?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</div>








    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>