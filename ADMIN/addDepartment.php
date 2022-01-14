<?php
 include("config.php");

session_start();

if(!isset($_SESSION["userType"]))
{
    header("location:../login.php");
}


               if(!empty($_POST)){
                 $dept_name = $_POST['dept_name'];
                 $dept_id = $_POST['dept_id'];
                 if (!empty($dept_id)) { 

                  $dup = mysqli_query($con,"SELECT * FROM departments WHERE dept_id = '$dept_id'");
                  if(mysqli_num_rows($dup)>0){
                    echo '<script>alert("Duplicated Value")</script>';
                  }

                  else{
                     $insert="INSERT INTO departments (dept_name, dept_id)
                     VALUES('$dept_name','$dept_id')";
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
   <title>Departments</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="addDepartment.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../table.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
  

<?php
include_once("education_nav.php");
?>

<div style="margin-top: 5%; ">
<div style="background-color: black; margin:auto; width:50%; border-radius:5px;">
<br><div class="form-style-5" >
<form method="post" action="">
<fieldset >
<legend style="color:white"><span class="number">NCR</span> Department Info</legend>
<input type="text" name="dept_name" placeholder="Department Name">
<input type="text" name="dept_id" placeholder="Department ID">
<input type="submit" value="Save" />
</form>
</div>
</div>
</div>
<!-- For view all dept -->

<!-- <div class="col-sm-3"> -->
  <br><br>
  <div class="col-md-12">
  <div class="container">
    <div class="card text-center">
    <div class="card-header">
      <!-- <h5 style="float: left;"></h5> -->
    </div>
    <div class="card-body">
      <h2 class="ti" style="color: white;"><strong>Existing Departments</strong></h2>
      <table class="table">
        
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">ID</th>
        <th scope="col">Department Name</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>

      <?php
      include("config.php");
      $i = 0;
          $sel="SELECT * FROM departments ORDER BY dept_id ASC";
          $Q=mysqli_query($con,$sel);
          while($data=mysqli_fetch_assoc($Q)){
      ?>
      <tr>
        <th scope="row"><?php echo ++$i; ?></th>
        <td><?= $data['dept_id']; ?></td>
        <td><?= $data['dept_name']; ?></td>
        <td>
          <a href="editDepartment.php?e=<?= $data['dept_id']; ?>" class="btn btn-primary">Edit</a>
          <a href="deleteDepartment.php?d=<?= $data['dept_id']; ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</div>





<!--  -->
</body>
    </html>