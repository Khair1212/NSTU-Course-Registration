<?php
include("config.php");

session_start();
if(!isset($_SESSION["userType"])){
  header("location:Login.php");
  exit();
}
else if(isset($_SESSION["userType"]) ){
  $userType = $_SESSION["userType"];

  if($userType!="sectionofficer")
  { 
    session_destroy();
    session_unset();
    header("location:Login.php");
  }
}

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

     
    <link rel="stylesheet" href="studentBG.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  </head>
  <body>
<?php
include_once("so_nav.php");
?>

</div>
 
    <!-- <section></section> -->



     <!-- BG HTML -->
     <section>
    <h2 id="title_name">
       Section Officer Workspace
      </h2>
  </div>
     </section>

<!-- End BG -->






<!-- FOOTER  -->
<?php
include_once("footer.php");
?>
</body>
</html>
