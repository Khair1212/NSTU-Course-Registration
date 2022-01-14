<?php

include("config.php");

session_start();

if (!isset($_SESSION["userType"])) {
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
  <link rel="stylesheet" href="../style.css">

  <title>Feedback | Admin</title>

  <style>
    .container {
      width: 100%;
      background-color: #756a6a;
      font-weight: 600;
    }
  </style>



</head>

<body>





  <?php
  include_once("education_nav.php");
  ?>


  <div class="hero" style="background-image: url('images/nstu.jpg');"></div>



  <!-- Message -->

  <br><br>
  <div class="col-md-12">
    <div class="container" style="margin-top: 10%;">
      <div class="card text-center">
        <div class="card-header">
          <h5 style="float: left;"></h5>
        </div>
        <div class="card-body" >
          <h2 class="ti"><strong>Messages</strong></h2>
          <table class="table">

            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Email</th>
                <th scope="col">Message</th>
                <th scope="col">Batch No</th>
                <th></th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>

              <?php
              include("config.php");
              // $con = mysqli_connect("localhost", "root","","multiuser") or die ("Connection Failed");
              $i = 0;
              $sel = "SELECT * FROM contact";
              // $sel = "SELECT fm.*, h.hall_name
              // FROM faculty_members fm, hall h
              // WHERE h.id=fm.member_id";

              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <th scope="row"><?php echo ++$i; ?></th>
                  <td><?= $data['email']; ?></td>
                  <td><?= $data['message']; ?></td>
                  <td><?= $data['batch']; ?></td>

                  <td>
                  <td><a href="mailto:<?= $data['email']; ?>?subject=NCR_Admin" class="btn btn-primary mr-2">Reply</a></td>
                  </td>
                </tr>

              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <!--  -->


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
</body>

</html>