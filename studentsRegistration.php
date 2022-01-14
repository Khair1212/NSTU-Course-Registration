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
 $institute = $_POST['institute'];
 $department = $_POST['department'];
 $dept_id = $_POST['dept_id'];
 $name= $_POST['name'];
 $fname = $_POST['fname'];
 $mname = $_POST['mname'];
 $year = $_POST['year'];
 $term = $_POST['term'];
 $session= $_POST['session'];
 $roll = $_POST['roll'];
 $hall_id= $_POST['hall_id'];
 $res_status = $_POST['res_status'];
 $email = $_POST['email'];
 $mobile = $_POST['mobile'];
 $password = md5($_POST['password']);
 $cpassword = md5($_POST['cpassword']); 

  if (!empty($email)) {
    if(!empty($roll)){
    if ( $password == $cpassword) {

      $dup = mysqli_query($con,"SELECT * FROM student_details WHERE roll = '$roll'");
      if(mysqli_num_rows($dup)>0){
        echo '<script>alert("Duplicated Value")</script>';
      }

      else{

      $insert="INSERT INTO student_details (institute, department,dept_id,name, father_name, mother_name, year,term,session,roll,hall_id,res_status,email,mobile,password)
      VALUES('$institute','$department', '$dept_id','$name', '$fname', '$mname', '$year','$term','$session','$roll','$hall_id','$res_status','$email','$mobile','$password')";
      if(mysqli_query($con,$insert)){
          echo '<script>alert("Registration Complete")</script>';
      }else{
          echo '<script>alert("Registration Failed! Please, Try Again")</script>';
      }
    }
    }
  }
 }
  }
?>





<!DOCTYPE html>
<!-- Created By CodingNepal -->
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Registration Form</title>
      <link rel="stylesheet">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link rel="stylesheet" href="studentsRegistration.css">



<?php
  include_once("so_nav.php");
  ?>


   </head>
 <body style="background-size: cover;">




<br>
      <div class="wrapper">
         <div class="title-text">
           <!-- <div class="title login">
               Login Form
            </div> -->
            <div class="title signup">
               Registration Form
            </div>
         </div>
         <!--<div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Registration</label>
               <div class="slider-tab"></div>
            </div> -->

            <div class="form-inner">
            
               <form action="#" class="Student Registration" method="post">


               <div class="field">
               <label>Faculty/Institute</label>
                     <input name="institute" required type="text"  placeholder="IIT">
                  </div></br>

              <div class="field">
               <label>Department name</label>
                     <input name="department" required type="text"  placeholder="Software Engineering">
                  </div></br>

                  <div class="field">
                  <label>Department ID</label>
                     <input type="text" placeholder="SE25" name="dept_id" pattern ="[A-Za-z0-9_]{4,8}" required>
                  </div></br>

                  <div class="field">
                  <label>Fullname</label>
                     <input type="text" placeholder="Student's Fullname" name="name" required>
                  </div></br>
                  
                  <div class="field">
                  <label>Father Name</label>
                     <input type="text" placeholder="Student's Father Name" name="fname" required>
                  </div></br>

                  <div class="field">
                  <label>Mother Name</label>
                     <input type="text" placeholder="Student's Mother Name" name="mname" required>
                  </div></br>

                  <div class="field">
                  <label>Year no</label>
                     <input required type="number" step="any" name="year" ng-model="user.year" min="1" max="5" placeholder="3" />
                  </div>

                  <div class="field">
                  <label>Term no</label>
                       <input required type="number" step="any" name="term" ng-model="user.term" min="1" max="2" placeholder="1" />
                </div></br>

                <div class="field">
                  <label>Session</label>
                       <input required type="number" step="any" name="session" ng-model="user.term" min="11" max="52" placeholder="31" />
                </div></br>
         
                <div class="field">
                  <label>Studnt ID</label>
                       <input required type="text" step="any" name="roll"  placeholder="ASH1825037M" />
                </div></br>
                

                <div class="field">
                  <label>Hall Name</label>
                     <input type="text" placeholder="ASH" name="hall_id" required>
                  </div></br>

                  <div class="field">
                  <label>Residential status</label>
                     <input type="text" placeholder="Abasik / Onabasik" name="res_status" required>
                  </div></br>

                <div class="field">
                    <label>Email</label>
                     <input type="text" placeholder="Email Address" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                  </div></br>

                  <div class="field">
                      <label>Mobile Number</label>
                     <input type="number" placeholder="o1********" name="mobile" required>
                  </div></br>
                 
                  <div class="field">
                  <label>Password</label>
					 <input name="password" type="password" minlength="8" maxlength="100" ng-pattern="/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/" required placeholder="Atleast 8 characters">							
                  </div></br>

                  <div class="field">
                  <label>Confirm Password</label>
					 <input name="cpassword" type="password" minlength="8" maxlength="100" ng-pattern="/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/" required placeholder="Same as Password field">
                  </div></br>

                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Register">
                  </div>
               </form>
            </div>
         </div>
      </div>


      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>
