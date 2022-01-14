<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="table.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="student_info.css">


</head>
<body>
<!-- navbar -->
  <?php
include_once("so_nav.php");
  ?>


<div style="margin-top:5%;">
<div class="col-md-12">
  <div class="container">
    <div>
      <h5 style="float: left;"></h5>
    </div>
    <div>
      <table class="table">
        
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Mobile</th>
        <th scope="col">Residential Status</th>
        <th scope="col">CGPA</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

      <?php
      include("config.php");
      $i = 0;
          $sel="SELECT * FROM student_details";
          $Q=mysqli_query($con,$sel);
          while($data=mysqli_fetch_assoc($Q)){
      ?>
      <tr>
        <th scope="row"><?php echo ++$i; ?></th>
        <td><?= $data['Roll']; ?></td>
        <td><?= $data['Name']; ?></td>
        <td><?= $data['Email']; ?></td>
        <td><?= $data['Mobile']; ?></td>
        <td><?= $data['res_status']; ?></td>
        <td><?= $data['cgpa']; ?></td>
        <td>
          <a href="studentResults.php" class="btn btn-primary">Add Result</a>
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