

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

               if(!empty($_POST)){
                 $dept_name = $_POST['dept_name'];
                 $dept_id = $_POST['dept_id'];
                 $session = $_POST['session'];


                 if (!empty($dept_id)) { 

                  $dup = mysqli_query($con,"SELECT * FROM course_coordinator WHERE session = '$session' AND dept_id='$dept_id' ");
                  if(mysqli_num_rows($dup)>0){
                    echo '<script>alert("Duplicated Value")</script>';
                  }
                  else{
                     $insert="INSERT INTO course_coordinator (dept_name, dept_id, session)
                     VALUES('$dept_name', '$dept_id', '$session')";
                     if(mysqli_query($con,$insert)){
                         echo '<script>alert("Entry Completed")</script>';
                         header("location:"); 
                     }else{
                         echo '<script>alert("Failed!")</script>';
                     }
                    }
                }
              }           
    ?>





<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <title>Section Officer Workplace</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="addSectionOfficer.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="course_co.css">
    <style>
    
      a:hover
      {
      background-color: green;}
  
    
    </style>

  </head>
  <body>

  <?php
include_once("so_nav.php");
  ?>

    <!-- <div class="hero" style="background-image: url('images/nstu.jpg');"></div> -->




   <!-- Form -->
   <br><form method="post" action="">

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h5>Course Co-ordinators</h5>
                        <!-- <p>Enter Authenticate information</p> -->
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="dept_name" placeholder="Department Name" required>
                              
                            </div>

                            <div class="col-md-12">
                              <input class="form-control" type="text" name="dept_id" placeholder="Department Id" pattern ="[A-Za-z0-9_]{4,8}" required>
                              
                           </div>

                           <div class="col-md-12">
                              <input class="form-control" type="text" name="session" placeholder="Session" required>
                              
                           </div>
                            
                            <br><div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </form>





    <!-- List Directors -->
    <br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
  <div class="col-md-12">
  <div class="container">
    <div class="card text-center">
    <div class="card-header">
      <h5 style="float: left;"></h5>
    </div>
    <div class="card-body">
      <h2 class="ti"><strong>Course Co-ordinator(s)</strong></h2>
      <table class="table">
        
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Dept. Id</th>
        <th scope="col">Department Name</th>
        <th scope="col">Session</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
       
        
      </tr>
    </thead>
    <tbody>

      <?php
      include("config.php");
      // $con = mysqli_connect("localhost", "root","","multiuser") or die ("Connection Failed");
      $i = 0;
          // $sel="SELECT * FROM courses ORDER BY dept_id ASC";
          $sel = "SELECT fm.*, co.dept_name, co.session
          FROM faculty_members fm, course_coordinator co
          WHERE fm.dept_id=co.session";

          $Q=mysqli_query($con,$sel);
          while($data=mysqli_fetch_assoc($Q)){
      ?>
      <tr>
        <th scope="row"><?php echo ++$i; ?></th>
        <td><?= $data['name']; ?></td>
        <td><?= $data['dept_id']; ?></td>
        <td><?= $data['dept_name']; ?></td>
        <td><?= $data['session']; ?></td>
        <td><?= $data['username']; ?></td>
        <td><?= $data['email']; ?></td>

        
        
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