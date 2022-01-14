<?php

include("config.php");

session_start();

if (!isset($_SESSION["userType"])) {
  header("location:Login.php");
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
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="table.css">


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

        <div class="col-12 col-md-10 d-none d-xl-block">
          <?php
          include_once("register_nav.php");
          ?>
        </div>


        <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

      </div>

    </div>
    </div>

  </header>

  <div class="hero" style="background-image: url('images/nstu.jpg');"></div>






  <!-- List -->


  <br><br>
  <div class="col-md-12" style="text-align:center">
    <div class="container">
      <div class="card text-center">
        <div class="card-header">
          <h5 style="float: left;"></h5>
        </div>
        <div class="card-body" style="margin-top: 5%;">
          <h1 class="ti" style="color: white;">Provost</h1>
          <div style="margin-left:22%">
          <table class="table" style="width: 70%;">

            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Dept. Id</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <!-- <th scope="col">Password</th> -->
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
          WHERE h.email=fm.email";

              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <th scope="row"><?php echo ++$i; ?></th>
                  <td><?= $data['name']; ?></td>
                  <td><?= $data['dept_id']; ?></td>
                  <td><?= $data['username']; ?></td>
                  <td><?= $data['email']; ?></td>
                  <!-- <td><?= $data['password']; ?></td> -->
                  <td><?= $data['hall_name']; ?></td>

                </tr>

              <?php } ?>
            </tbody>
          </table>
          </div>
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