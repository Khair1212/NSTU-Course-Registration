<?php
include("config.php");

session_start();
if (!isset($_SESSION["userType"])) {
  header("location:Login.php");
  exit();
} else if (isset($_SESSION["userType"])) {
  $userType = $_SESSION["userType"];

  if ($userType != "co-ordinator") {
    session_destroy();
    session_unset();
    header("location:Login.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Course Coordinator</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <href="https: //fonts.googleapis.com/css?family=Courgette|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="studentBG.css">
    <style>
      a:hover {
        background-color: green;
      }
    </style>



    <div>
      
    </div>
</head>

<body>


<?php
include_once("co_ordinator_nav.php");
?>



  <!-- BG HTML -->
  <section>
    <h2 id="title_name">
      Course Coordinator Place
    </h2>
    </div>

  </section>

  <!-- End BG -->


<?php
include_once("footer.php");
?>