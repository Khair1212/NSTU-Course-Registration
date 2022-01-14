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
      if($userType != "student")
      { 
          session_destroy();
          session_unset();
          header("location:Login.php");
      }
    }


?>

<?php 



include("config.php");


if(!empty($_POST)){
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $email = $_POST['email'];
  $batch = $_POST['batch'];
  $message = $_POST['message'];

  if (!empty($email)) { 
  
      $insert="INSERT INTO contact (fname, lname, email, batch, message)
      VALUES('$fname','$lname','$email','$batch','$message')";
      if(mysqli_query($con,$insert)){
          echo '<script>alert("Message Sent")</script>';
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
    <title>Contact with Online Course Registration Authority, NSTU</title>
    <link rel="stylesheet" href="studentContact.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  </head>
  <!-- <h1>Need help!</h1> -->
  <body>

    <div class="container">
      <div class="text">Contact us</div>
      <div><a class="active" href="student.php"><button class="btn warning">Back to Home</button></a></div> 
<form action="" method = "post">
        <div class="form-row">
          <div class="input-data">
            <input type="text" name="fname"  required>
            <div class="underline">
</div>
<label for="">First Name</label>
          </div>
<div class="input-data">
            <input type="text" name= "lname" required>
            <div class="underline">
</div>
<label for="">Last Name</label>
          </div>
</div>
<div class="form-row">
          <div class="input-data">
            <input type="email" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
            <div class="underline">
</div>
<label for="">Email Address</label>
          </div>
<div class="input-data">
            <input type="number" name="batch" required>
            <div class="underline">
</div>
<label for="">Batch Number</label>
          </div>
</div>
<div class="form-row">
          <div class="input-data textarea">
            <textarea rows="8" cols="80"  name="message" required></textarea> 
            <br />
<div class="underline">
</div>
<label for="">Write your message</label>
          
        
        <br />
<div class="form-row submit-btn">
          <div class="input-data">
            <div class="inner"></div>
            <input type="submit" name ="submit" value="Submit">
          </div>
        </div>
      </form>
    </div>

  </body>
</html>
