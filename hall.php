<?php
include("config.php");

session_start();

if (!isset($_SESSION["userType"])) {
  header("location:Login.php");
}


if (!empty($_POST)) {
  $hall_name = $_POST['hall_name'];
  $hall_id = $_POST['hall_id'];
  $email= $_POST['email'];

  if (!empty($hall_id)) {

    $dup = mysqli_query($con, "SELECT * FROM hall WHERE hall_id = '$hall_id'");
    if (mysqli_num_rows($dup) > 0) {
      echo '<script>alert("Duplicated Value")</script>';
    } else {
      $insert = "INSERT INTO hall (hall_name, hall_id, email)
                     VALUES('$hall_name','$hall_id', '$email')";
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




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Hall</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="addDepartment.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="table.css">
  <style>
    a:hover {
      background-color: green;
    }
  </style>

</head>

<body>
  <div>
    <?php
    include_once("register_nav.php");
    ?>
  </div>



  <!-- Form -->
  <br>
  
  <div style="margin-top:4%;">
  <div style="background-color: black; width:55%; margin:auto; border-radius:5px;  padding-top:2%; padding-bottom:2%;">
  <div class="form-style-5">
    <form method="post" action="">
      <fieldset>
        <legend  style="color:white;"><span class="number">NCR</span>Add Hall</legend>
        <input type="text" name="hall_name" placeholder="Hall Name">
        <input type="text" name="hall_id" placeholder="Hall ID">
        <input type="text" name="email" placeholder="Provost Email">

        <input type="submit" value="ADD" />
    </form>
  </div>
  </div>
  </div>
  <!-- For view all dept -->



  <!-- <div class="col-sm-3"> -->
  <br><br><br>
  <div class="col-md-4">
    <div class="container">
      <div class="card text-center">
        <div class="card-header">
          <h5 style="float: left;"></h5>
        </div>
        <div class="card-body" style="margin-left: 29%;">
          <h2 class="ti" style="color: white;"><strong>Hall List</strong></h2>
          <table class="table">

            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Hall ID</th>
                <th scope="col">Hall Name</th>
                <th scope="col">Action</th>

              </tr>
            </thead>
            <tbody>

              <?php
              include("config.php");
              $i = 0;
              $sel = "SELECT * FROM hall ORDER BY hall_id ASC";
              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <th scope="row"><?php echo ++$i; ?></th>
                  <td><?= $data['hall_id']; ?></td>
                  <td><?= $data['hall_name']; ?></td>
                  <td>
                    <!-- <a href="editDepartment.php?e=<?= $data['hall_id']; ?>" class="btn btn-primary">Edit</a> -->
                    <a href="deletehall.php?d=<?= $data['hall_id']; ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>



</body>

</html>