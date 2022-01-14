<?php
include("config.php");

session_start();

if (!isset($_SESSION["userType"])) {
  header("location:../login.php");
  exit();
}
// else{
//   $userType = $_SESSION["userType"];
//   if($userType != "education")
//   { 
//     session_destroy();
//     session_unset();
//     header("location:../login.php");
//   }
// }

//    if(!empty($_POST)){
if (isset($_POST['send'])) {
  $fromm = $_POST['fromm'];
  $too = $_POST['too'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];



  //  $file = rand(1000,100000)."-".$_FILES['file']['name'];
  //  $file_loc = $_FILES['file']['tmp_name'];
  //  $file_size = $_FILES['file']['size'];
  //  $file_type = $_FILES['file']['type'];
  //  $folder="uploads/"; 

  //  $new_size = $file_size/1024;  
  //  $new_file_name = strtolower($file);
  //  $final_file = str_replace(' ','-',$new_file_name);

  // if(move_uploaded_file($file_loc,$folder.$final_file)){



  $pname = $_FILES["file"]["name"];
  $ext = pathinfo($pname, PATHINFO_EXTENSION);
  $fileName = uniqid() . "." . $ext;
  $tname = $_FILES['file']['tmp_name'];
  $uploads_dir = 'images';
  move_uploaded_file($tname, $uploads_dir . '/' . $fileName);


  if (!empty($fromm)) {

    $dup = mysqli_query($con, "SELECT * FROM mail WHERE file = '$fileName'");
    if (mysqli_num_rows($dup) > 0) {
      echo '<script>alert("Duplicated Value")</script>';
    } else {
      $insert = "INSERT INTO mail (fromm, too, subject, message, file)
                     VALUES('$fromm', '$too', '$subject', '$message', '$fileName')";

      if (mysqli_query($con, $insert)) {
        echo '<script>alert("Message Sent Successfully")</script>';
        header("location:");
      } else {
        echo '<script>alert("Failed!")</script>';
      }
    }
  }
}
// }

?>



<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Education Inbox</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <link rel="stylesheet" href="../addDepartment.css">
  <link rel="stylesheet" href="../table.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
    a:hover {
      background-color: green;
    }

    .file {
      margin: 0 auto;
    }
  </style>



  


</head>

<body>

<?php

include_once("education_nav.php");
?>







  <!-- Form -->

  <br><br>
  <div class="form-style-5">
    <form method="post" action="educationMail.php" enctype="multipart/form-data">
      <fieldset>
        <h6><span class="number">NCR</span>Send Notice to Department</h6>
        <input type="text" name="fromm" placeholder="From">
        <input type="text" name="too" placeholder="To">
        <input type="text" name="subject" placeholder="Subject">
        <input type="text" name="message" placeholder="Short Message">
        <label class="custom-file-upload cfile">
          <input type="file" name="file" />
          Choose File
        </label>


        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <p id="selected_file" style="color:white;">
        <script>
          $(document).ready(function() {
            $('input[type="file"]').change(function(e) {
              var fileName = e.target.files[0].name;

              document.getElementById("selected_file").innerHTML = 'The file "' + fileName + '" has been selected.';
            });
          });
        </script>
        </p>
        <!-- <button type="submit" name="" class="up">Attach File</button> -->
        <input type="submit" value="Send" name="send" />
        </fieldset>
    </form>
  </div>

  <!-- Form End -->



  <!-- Incoming message -->

  <br><br>
  <div class="col-md-12">
    <div class="container">
      <div class="card text-center">
        <div class="card-header">
          <h5 style="float: left;"></h5>
        </div>
        <div class="card-body">
          <h2 style="color: Black;"><strong>Messages from Department(s)</strong></h2>
          <table class="table">

            <thead class="thead-light">
              <tr>
                <th scope="col">#</th>
                <th scope="col">Department id</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">File</th>
                <th scope="col">Delete</th>


              </tr>
            </thead>
            <tbody>

              <?php
              include("config.php");
              $i = 0;
              $sel = "SELECT * FROM reply ORDER BY dept_id ASC";
              $Q = mysqli_query($con, $sel);
              while ($data = mysqli_fetch_assoc($Q)) {
              ?>
                <tr>
                  <th scope="row"><?php echo ++$i; ?></th>
                  <td><?= $data['dept_id']; ?></td>
                  <td><?= $data['subject']; ?></td>
                  <td><?= $data['message']; ?></td>
                  <!-- <td><?= $data['file']; ?></td> -->
                  <td><a href="images/<?= $data['file']; ?>" target="_blank">Click to see</a></td>

                  <td>
                    <!-- <a href="?e=<?= $data['dept_id']; ?>" class="btn btn-primary">Edit</a> -->
                    <a href="deleteEduMail.php?d=<?= $data['too']; ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a>
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