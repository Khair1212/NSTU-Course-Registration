<?php
   include("config.php");
   include("header.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <title>Student Space</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="studentBG.css">


  </head>
  <body>
    <?php
    if (isset($_SESSION["id"])) {
      $id = $_SESSION["id"];
      $mysqli = new mysqli('localhost', 'root', '', 'multiuser') or die(mysqli_error($mysqli));
      $result = $mysqli->query("SELECT * from student_details WHERE student_details.id= '$id'") or die($mysqli->error);
      $row = $result->fetch_array();
      $name = $row['Name'];
      $roll = $row['Roll'];
      $dept = $row['Department'];
      $year = $row['Year'];
      $hall = $row['hall_id'];

      $coSigId = $row['co_c_approve_by'];
      $chDiSigId = $row['ch_di_approve_by'];
      $provSigId = $row['prov_approve_by'];

      $cosig = "";
      if($coSigId>0){
        $coSigrslt = $mysqli->query("SELECT signature FROM multiuserlogin WHERE id = '$coSigId'") or die($mysqli->error);
        $cosigData = $coSigrslt->fetch_array();
        $cosig = $cosigData['signature'];
      }

      $chDiSig = "";
      if($chDiSigId>0){
        $chDiSigIdrslt = $mysqli->query("SELECT signature FROM multiuserlogin WHERE id = '$chDiSigId'") or die($mysqli->error);
        $chDiSigIdData = $chDiSigIdrslt->fetch_array();
        $chDiSig = $chDiSigIdData['signature'];
      }

      $provSig = "";
      if($provSigId>0){
        $provSigIdrslt = $mysqli->query("SELECT signature FROM multiuserlogin WHERE id = '$provSigId'") or die($mysqli->error);
        $provSigIdData = $provSigIdrslt->fetch_array();
        $provSig = $provSigIdData['signature'];
      }

      $columnName = "batch0".$year;

      $isApplied = 0;
      $rslt = $mysqli->query("SELECT $columnName FROM student_details WHERE id = '$id' ") or die($mysqli->error);
      $apply = $rslt->fetch_array();
      
      $isApplied = $apply[$columnName];
      
      $term = $row['Term'];
      $session = $row['session'];
      


      $course_info = $mysqli->query("SELECT * from courses WHERE courses.year= '$year' and courses.term= '$term' ") or die($mysqli->error);
      $course_row = $course_info->fetch_array();


      $result_info = $mysqli->query("SELECT * from student_results WHERE student_results.student_id= '$roll' ORDER BY student_results.year, student_results.term;") or die($mysqli->error);
      $result_row = $result_info->fetch_array();



      $last_course_credit = $mysqli->query("SELECT sum(credit) as sum_credit from courses WHERE courses.year= '$year' and courses.term= '$term'") or die($mysqli->error);

      $last_course_credit = $last_course_credit->fetch_array();
     
    }

  ?>
    <!-- <section></section> -->
    </body>






     <!-- BG HTML -->
   <section>
    <h2 id="title_name">
       Student Space
      </h2>
  </div>
     

<!-- End BG -->


<?php
include_once("footer.php");
?>


</html>
