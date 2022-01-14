<?php
 include("config.php");

 session_start();

 if(!isset($_SESSION["userType"])){
   header("location:Login.php");
   exit();
 }
 else{
   $userType = $_SESSION["userType"];
   if($userType != "sectionofficer")
   { 
     session_destroy();
     session_unset();
     header("location:Login.php");
   }
 }
 
               if(!empty($_POST)){
                 $dept_id = $_POST['dept_id'];
                 $course_name = $_POST['course_name'];
                 $course_code = $_POST['course_code'];
                 $year = $_POST['year'];
                 $term = $_POST['term'];
                 $credit = $_POST['credit'];



                 if (!empty($course_code)) { 
                     $insert="INSERT INTO courses (dept_id, course_name, course_code, year, term, credit)
                     VALUES('$dept_id', '$course_name', '$course_code', '$year', '$term', '$credit')";
                     if(mysqli_query($con,$insert)){
                         echo '<script>alert("Entry Completed")</script>';
                         header("location:"); 
                     }else{
                         echo '<script>alert("Failed!")</script>';
                     }
                }
              }           
    ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <title>Course</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="addDepartment.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<link rel="stylesheet" href="table.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  </head>
  <body>
  <?php
include_once("so_nav.php");
    ?>
    <!-- <section></section> -->
<div style="margin-top: 7%;">
<div style="background-color: black; width:74%; margin:auto; padding-bottom:15px; border-radius:5px;">

   <br><br><div class="form-style-5">
<form method="post" action="">
<fieldset>
<legend style="color: white;"><span class="number">NCR</span> Course Info</legend>


<input type="text" name="course_name" placeholder="Course Name">
<input type="text" name="course_code" placeholder="Course Code">
<input required type="number" step="any" name="year" min="1" max="5" placeholder="Year"/>
<input required type="number" step="any" name="term"  min="1" max="2" placeholder="Term"/>
<input type="text" name="credit" placeholder="Credit">
<input type="submit" value="Save" />
</form>
</div>

</div>
</div>

<!-- List  -->

<br><br>
  <div class="col-md-12">
  <div class="container">
    <div class="card text-center">
    <div class="card-header">
      <h5 style="float: left;"></h5>
    </div>
    <div class="card-body">
      <h2 class="ti"><strong>All Courses</strong></h2>
      <table class="table">
        
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Department id</th>
        <th scope="col">course Name</th>
        <th scope="col">course code</th>
        <th scope="col">Year</th>
        <th scope="col">Term</th>
        <th scope="col">Credit</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>

      <?php
      include("config.php");
      $i = 0;
          $sel="SELECT * FROM courses ORDER BY dept_id ASC";
          $Q=mysqli_query($con,$sel);
          while($data=mysqli_fetch_assoc($Q)){
      ?>
      <tr>
        <th scope="row"><?php echo ++$i; ?></th>
        <td><?= $data['dept_id']; ?></td>
        <td><?= $data['course_name']; ?></td>
        <td><?= $data['course_code']; ?></td>
        <td><?= $data['year']; ?></td>
        <td><?= $data['term']; ?></td>
        <td><?= $data['credit']; ?></td>
        
        <td>
          <a href="?e=<?= $data['dept_id']; ?>" class="btn btn-primary">Edit</a>
          <a href="deleteCourse.php?d=<?= $data['course_code']; ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</div>

    </body>
</html>
