<?php
include("config.php");

session_start();

if(!isset($_SESSION["userType"]))
{
    header("location:../login.php");
}

$id=$_GET['e'];
$sel="SELECT * FROM departments WHERE dept_id=$id";
$Q=mysqli_query($con,$sel);
$info=mysqli_fetch_assoc($Q);
if(!empty($_POST)){
    $eid=$_POST['eid'];
    $dept_name=$_POST['dept_name'];
    $dept_id=$_POST['dept_id'];

    if(!empty($dept_name)){
        $update="UPDATE departments SET dept_name='$dept_name' WHERE dept_id='$id'";
        if(mysqli_query($con,$update)){
            header('Location: addDepartment.php');
        }else{
          echo "Update failed!";
        }
    }else{
        echo "Please enter your name!";
    }
}
 ?>
<div class="col-md-12">
  <div class="container">
    <div class="col-md-8">
      <div class="card text-center">
      <div class="card-header">
        <h5 style="float: left;">Featured</h5>
      </div>
      <div class="card-body">
        <h5 class="card-title">Edit Product Details</h5>
        <form class="" method="post" style="width:500px;">
          <div class="form-group">
          <div class="input-group">
            <input type="hidden" name="eid" value="<?= $info['dept_id'];?>">
            <span class="input-group-text">Department Name</span>
            <input type="text" class="form-control" name="dept_name" value="<?= $info['dept_name']; ?>">
            </div>
          </div>
  
  
          <button type="submit" class="btn btn-primary">Update Info</button>
        </form>
      </div>
    </div>
    </div>
  </div>
</div>