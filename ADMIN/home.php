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
  <link rel="stylesheet" href="../studentBG.css">


  <title>Admin Panel</title>





</head>

<body>

          <?php
          include_once("education_nav.php");
          ?>
      
      <section>
    <h2 id="title_name">
       Education Branch Workplace
      </h2>
  </div>
            
     </section>

   

 


  <div class="hero" style="background-image: url('images/nstu.jpg');"></div>



  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>

 
</body>

</html>