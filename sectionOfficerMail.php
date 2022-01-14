<?php
include("config.php");

session_start();

if (!isset($_SESSION["userType"])) {
  header("location:Login.php");
  exit();
} else {
  $userType = $_SESSION["userType"];
  if ($userType != "sectionofficer") {
    session_destroy();
    session_unset();
    header("location:Login.php");
  }
}

//    if(!empty($_POST)){
if (isset($_POST['send'])) {
  $re_id = $_POST['re_id'];
  $dept_id = $_POST['dept_id'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];


  $pname = $_FILES["file"]["name"];
  $ext = pathinfo($pname, PATHINFO_EXTENSION);
  $fileName = uniqid() . "." . $ext;
  $tname = $_FILES['file']['tmp_name'];
  $uploads_dir = 'uploads';
  move_uploaded_file($tname, $uploads_dir . '/' . $fileName);



  if (!empty($dept_id)) {
    $insert = "INSERT INTO reply (re_id, dept_id, subject, message, file)
                     VALUES('$re_id','$dept_id', '$subject', '$message', '$fileName')";
    if (mysqli_query($con, $insert)) {
      echo '<script>alert("Entry Completed")</script>';
      header("location:");
    } else {
      echo '<script>alert("Failed!")</script>';
    }
  }
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Send Email To Education</title>
  <link rel="stylesheet" href="sectionOfficerMail.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">







 
</head>

<body>
<?php
  include_once("so_nav.php");
  ?>

  <div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4 mail-form">
        <h2 class="text-center">Send Message</h2>

        <form action="" method="POST">
          <div class="form-group">
            <input class="form-control" name="re_id" type="Text" placeholder="Recipients Id">
          </div>

          <div class="form-group">
            <input class="form-control" name="dept_id" type="text" placeholder="Department Id">
          </div>

          <div class="form-group">
            <input class="form-control" name="subject" type="text" placeholder="Subject">
          </div>
          <div class="form-group">
            <textarea cols="30" rows="5" class="form-control textarea" name="message" placeholder="Write your message..."></textarea>
          </div>
          <div class="form-group"><input type="file" name="file" required /></div>
          <div class="form-group">
            <input class="form-control button btn-primary" type="submit" name="send" value="Send" placeholder="Subject">
          </div>
        </form>
      </div>
    </div>
  </div>

</body>

</html>