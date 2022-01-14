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

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <title>Inbox</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="table.css">



<?php
include_once("so_nav.php");
?>

  </head>
  <body>
 
 
<!-- Messages -->
<br><br>
  <div class="col-md-12">
  <div class="container">
    <div class="card text-center">
    <div class="card-header">
      <h5 style="float: left;"></h5>
    </div>
    <div class="card-body">
      <h2 class="ti"><strong>All Messages</strong></h2>
      <table class="table">
        
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">From</th>
        <th scope="col">Subject</th>
        <th scope="col">Short Message</th>
        <th scope="col">File </th>
        <th scope="col">Action</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php
      include("config.php");
      $i = 0;
          $sel="SELECT * FROM mail ORDER BY mail_id DESC";
          $Q=mysqli_query($con,$sel);
          while($data=mysqli_fetch_assoc($Q)){
      ?>
      <tr>
        <th scope="row"><?php echo ++$i; ?></th>
        <td><?= $data['fromm']; ?></td>
        <td><?= $data['subject']; ?></td>
        <td><?= $data['message']; ?></td>
        <td><a href="images/<?= $data['file']; ?>" target="_blank">Click to see</a></td>
        
        <td>
          <a href="sectionOfficerMail.php?e=<?= $data['mail_id']; ?>" class="btn btn-primary">Reply</a>
          <a href="deleteSOMail.php?d=<?= $data['mail_id']; ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a> 
        </td>
        <td>
          <a href="upload.php?file=<?= $data['file']; ?>" class="btn btn-primary">Publish</a>
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