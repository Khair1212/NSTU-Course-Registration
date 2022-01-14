

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
                 $student_id = $_POST['student_id'];
                 $year = $_POST['year'];
                 $term = $_POST['term'];
                 $credit = $_POST['credit'];
                 $cgpa = $_POST['cgpa'];

                 echo "$credit"; 

                 if (!empty($student_id)) { 

                  $dup = mysqli_query($con,"SELECT * FROM student_results WHERE student_id = '$student_id' and year = '$year' and term = '$term' ");
                  if(mysqli_num_rows($dup)>0){
                    echo '<script>alert("Duplicated Value")</script>';
                  }
                  else{
                     $insert="INSERT INTO student_results (student_id, year, term, credit_completed , cgpa)
                     VALUES('$student_id', '$year', '$term','$credit', '$cgpa')";
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
   <title>Student Results</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="addSectionOfficer.css">

        <href="https://fonts.googleapis.com/css?family=Courgette|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="studentBG.css">
    <style>
    
      a:hover
      {
      background-color: green;}
  
    
    </style>

  </head>
  <body>

  <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">N<span style="color:red;">C</span>R</label>
      <ul>
      <li><a href="sectionOfficer.php">Home</a></li>
        <li><a href="sectionOfficerMail.php">New Application</a></li>
        <li><a class="" href="studentsRegistration.php">Student Registration</a></li>
        <li><a href="addCourse.php">Course</a></li>
        <li><a href="course_co.php">Coordinator</a></li>

        <li><a href="Mail.php">Last Mails</a></li>
        <!-- <li><a href="uploadForm.php">Notice Upload</a></li> -->
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
    </nav> 

    <!-- <div class="hero" style="background-image: url('images/nstu.jpg');"></div> -->




   <!-- Form -->
   <br><form method="post" action="">

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Result</h3>
                        <p>student</p>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="student_id" placeholder="Student Id" required>
                            </div>

                            <div class="col-md-12">
                              <input class="form-control" type="text" name="year" placeholder="Year" min ="1" max="5" required>
                               
                           </div>

                           <div class="col-md-12">
                               <input class="form-control" type="text" name="term" placeholder="Term" required>                            </div>
                            <div class="col-md-12">
                                <input class="form-control" type="text" name="credit" placeholder="Credit Completed" required>  
                            </div> 

                            <div class="col-md-12">
                                <input class="form-control" type="text" name="cgpa" placeholder="CGPA" required>  
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
    <!-- <br><br><br><br><br><br><br>
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
</div> -->
  


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>