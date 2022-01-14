<?php
include("config.php");

session_start();

if (!isset($_SESSION["userType"])) {
  header("location:../login.php");
}


if (!empty($_POST)) {
  $name = $_POST['name'];
  $dept_id = $_POST['dept_id'];
  $designation = $_POST['designation'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = md5($_POST['password']);


  $pname = $_FILES["file"]["name"];
  $ext = pathinfo($pname, PATHINFO_EXTENSION);
  $fileName = uniqid() . "." . $ext;
  $tname = $_FILES['file']['tmp_name'];
  $uploads_dir = 'images';
  move_uploaded_file($tname, $uploads_dir . '/' . $fileName);



  if (!empty($password)) {

    $dup = mysqli_query($con, "SELECT * FROM faculty_members WHERE email = '$email'");
    if (mysqli_num_rows($dup) > 0) {
      echo '<script>alert("Duplicated Value")</script>';
    } else {
      $insert = "INSERT INTO faculty_members (name, dept_id, designation, username,email, password, Signature)
                     VALUES('$name', '$dept_id', '$designation', '$username', '$email', '$password', '$fileName')";
      if (mysqli_query($con, $insert)) {
        echo '<script>alert("Entry Completed")</script>';
        header("location:");
      } else {
        echo '<script>alert("Failed!")</script>';
      }
    }
  }
}
?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="../style.css">
  <link rel="stylesheet" href="addSectionOfficer.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <title>Add Faculty</title>
  <style>
    form {
      margin: 0 auto;
      width: 40%;
    }
  </style>
</head>

<body>
<?php
include_once("education_nav.php");
          ?>



  <header class="site-navbar" role="banner">


    </div>

  </header>



  <!-- Form -->

  <form method="post" action="" enctype="multipart/form-data">

    <div class="form-body">
      <div class="row">
        <div class="form-holder" >
          <div class="form-content" >
            <div class="form-items"  style="background-color: black;">
              <h3>Faculty Member</h3>
              <p>Enter uthenticate information</p>

              <div class="col-md-12">
                <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                <div class="valid-feedback">Name field is valid!</div>
                <div class="invalid-feedback">Name field cannot be blank!</div>
              </div>

              <div class="col-md-12">
                <input class="form-control" type="text" name="dept_id" placeholder="Department Id" pattern="[A-Za-z0-9_]{4,8}" required>
                <div class="valid-feedback">Please fill correctly!</div>
                <div class="invalid-feedback">Id field cannot be blank!</div>
              </div>

              <div class="col-md-12">
                <input class="form-control" type="text" name="designation" placeholder="Designation" required>
              </div>

              <div class="col-md-12">
                <input class="form-control" type="text" name="username" placeholder="Username" pattern="[A-Za-z0-9]+" required>
                <div class="valid-feedback">Username field is valid!</div>
                <div class="invalid-feedback">Username field cannot be blank!</div>
              </div>

              <div class="col-md-12">
                <input class="form-control" type="email" name="email" placeholder="E-mail Address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                <div class="valid-feedback">Email field is valid!</div>
                <div class="invalid-feedback">Email field cannot be blank!</div>
              </div>


              <div class="col-md-12">
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                <div class="valid-feedback">Password field is valid!</div>
                <div class="invalid-feedback">Password field cannot be blank!</div>
              </div>

              <br>
              <div class="col-md-12">
                <label>Signature</label>
                <input class="form-control" type="file" name="file" placeholder="Signature" required>
                <div class="valid-feedback">Signature field is valid!</div>
                <div class="invalid-feedback">Password field cannot be blank!</div>
              </div>


              <div class="form-button mt-3">
                <button id="submit" type="submit" class="btn btn-primary">Register</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>




  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/main.js"></script>
</body>

</html>