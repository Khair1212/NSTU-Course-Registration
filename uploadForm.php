<?php

  include("config.php");

  session_start();

  if(!isset($_SESSION["userType"])){
  header("location:Login.php");
  exit();
  }
  else
  {
    $userType = $_SESSION["userType"];
    if($userType != "chairman")
    { 
        session_destroy();
        session_unset();
        header("location:Login.php");
    }
  }


$servername="localhost";
$username="root";
$password="";
$dbname="multiuser";
$conn = mysqli_connect($servername, $username, $password, $dbname);

//echo "Connected";

//include_once 'dbconfig.php';
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Notice Upload</title>
<link rel="stylesheet" href="upload.css" type="text/css" />
</head>
<body>




<?php
$servername="localhost";
$username="root";
$password="";
$dbname="upload";
$conn = mysqli_connect($servername, $username, $password, $dbname);

//echo "Connected";

//include_once 'dbconfig.php';
?>







<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <title>Section Officer Workplace</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <style>
    
      a:hover
      {
      background-color: green;
      /* font-color:red; */
      }

      .fu{
            font-color:red;
            font-family:algerian;
      }
      .up{
            color: green;
            font-family:algerian;
      }

      #header{
            background-color: green;
            width:70%; 
            margin: 0 auto;
            /* justify-content: center; */
      }
      #body{background-color: purple; 
            width : 50%;
            height:50%;
            margin: 0 auto;
            /* text-align:center; */
      }
    form{
      width:100%;
      margin: 0 auto;
    }
    </style>

  </head>

  <body>
 
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">NCR</label>
      <ul>
      <li><a class="" href="sectionOfficer.php">Home</a></li>
        <li><a class="" href="studentsRegistration.php">Student Registration</a></li>
        <li><a href="sectionOfficerMail.php">New Application</a></li>
        <li><a href="Mail.php">Last Mails</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </nav>
    <!-- <section></section> -->
   


<br><br><br><div id="header">
<label class="fu">Asked or Instructions to Course Co_ordnator</label>
</div><br><br><br>
<div id="body">
      <br>
 <form action="upload.php" method="post" enctype="multipart/form-data">
  <input type="file" name="file"/>
  <button type="submit" name="" class="up">Send</button>
 </form>
    <br /><br />

 <?php
 if(isset($_GET['success']))
 {
  ?>
        <label>File Uploaded Successfully. <a href="view.php">click here to view file.</a></label>
        <?php
 }
 else if(isset($_GET['fail']))
 {
  ?>
        <label>Problem While File Uploading!</label>
        <?php
 }
 else
 {
  ?>
        <label>Try to upload any files</label>
        <?php
 }
 ?>
</div>




<!-- FOOTER  -->
<footer>
    <link rel="stylesheet" href="footer.css">
      <div class="main-content">
        <div class="left box">
          <h2>About us</h2>
          <div class="content">
            <p>Online Course Registration of NSTU is a smart and digital way to form fill-up, pay credit fees and course fees for all semester and also students can apply for backlog application and don't have to go office tangible for any of these.</p>
            <div class="social">
              <a href="#"><span class="fab fa-facebook-f"></span></a>
              <a href="#"><span class="fab fa-twitter"></span></a>
              <a href="#"><span class="fab fa-instagram"></span></a>
              <a href="#"><span class="fab fa-youtube"></span></a>
            </div>
          </div>
        </div>

        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Noakhali, Sonapur</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">016*****</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">nstu.edu@gmail.com</span>
            </div>
          </div>
        </div>

        <div class="right box">
          <h2>Contact us</h2>
          <div class="content">
            <form action="#">
              <div class="email">
                <div class="text">Email *</div>
                <input type="email" required>
              </div>
              <div class="msg">
                <div class="text">Feedback *</div>
                 <textarea rows="2" cols="25" required></textarea>
              </div>
              <div class="btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </footer>


</body>
</html>
