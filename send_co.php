<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "multiuser";
$conn = mysqli_connect($servername, $username, $password, $dbname);

session_start();
if (!isset($_SESSION["userType"])) {
  header("location:Login.php");
  exit();
} else if (isset($_SESSION["userType"])) {
  $userType = $_SESSION["userType"];

  if ($userType != "chairman") {
    session_destroy();
    session_unset();
    header("location:Login.php");
  }
}

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
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "upload";
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  //echo "Connected";

  //include_once 'dbconfig.php';
  ?>


  <!DOCTYPE html>
  <html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="tps://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="send_co.css">

  </head>

  <body>

    <?php
    include_once("Chairman_nav.php");
    ?>
    <!-- <section></section> -->



    <div id="header">
      <label style="color: white;">Asked/Instruction to Course Coordinator</label>
    </div>
    <div id="upload_body">
      <br>
      <form action="send_co.php" method="post" enctype="multipart/form-data">
        <input type="text" name="session" placeholder="Session" />
        <label class="custom-file-upload">
          <input type="file" />
          Choose File
        </label>

        <button type="submit" name="file" class="up">Upload</button>
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <p id="selected_file"></p>
        <script>
          $(document).ready(function() {
            $('input[type="file"]').change(function(e) {
              var fileName = e.target.files[0].name;

              document.getElementById("selected_file").innerHTML = 'The file "' + fileName + '" has been selected.';
            });
          });
        </script>
      </form>
      <br /><br />

      <?php
      if (isset($_GET['success'])) {
      ?>
        <label>File Uploaded Successfully. <a href="view.php">click here to view file.</a></label>
      <?php
      } else if (isset($_GET['fail'])) {
      ?>
        <label>Problem While File Uploading!</label>
      <?php
      } else {
      ?>
        <label>Try to upload any files</label>
      <?php
      }
      ?>
    </div>




    <!-- FOOTER  -->

    <?php
    include_once("footer.php");
    ?>