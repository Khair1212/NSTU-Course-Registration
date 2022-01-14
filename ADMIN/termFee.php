
<?php
 include("config.php");


  session_start();

  if(!isset($_SESSION["userType"]))
  {
      header("location:../login.php");
  }


               if(!empty($_POST)){
                $termfee_id = $_POST['termfee_id'];
                 $dept_id = $_POST['dept_id'];
                 $total_course = $_POST['total_course'];
                 $total_credit = $_POST['total_credit'];
                 $year = $_POST['year'];
                 $term = $_POST['term'];
                 $residential = $_POST['residential'];
                 $credit_fee = $_POST['credit_fee'];
                 $residential_fee = $_POST['residential_fee'];
                 $other_fee = $_POST['other_fee'];
                 //$total_fee = $_POST['total_fee'];
                 $total_fee = (($total_credit) * ($credit_fee)+($residential_fee)+($other_fee));

                 if (!empty($termfee_id)) { 

                  $dup = mysqli_query($con,"SELECT * FROM term_fee WHERE termfee_id = '$termfee_id'");
                  if(mysqli_num_rows($dup)>0){
                    echo '<script>alert("Duplicated Value")</script>';
                  }
                  else{
                     $insert="INSERT INTO term_fee (termfee_id, dept_id, total_course, total_credit, year, term, residential, credit_fee, residential_fee, other_fee, total_fee)
                     VALUES('$termfee_id', '$dept_id', '$total_course', '$total_credit', '$year', '$term', '$residential','$credit_fee', '$residential_fee', '$other_fee', '$total_fee')";
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
   <title>Fee</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="../table.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="addDepartment.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style>
    a:hover
      {
      background-color: green;
      }
</style>

  </head>
  <body style="background-size: cover;">
  <?php
include_once("education_nav.php");
          ?>



<!--  -->
<br><br><div class="form-style-5">
<form method="post" action="">
<fieldset>
<legend><span class="number">NCR</span>Fees</legend>

<input type="number" name="termfee_id" placeholder="TermFee Id" required>
<input type="text" name="dept_id" placeholder="Department Id" pattern ="[A-Za-z0-9_]{4,8}" required>
<input type="text" name="total_course" placeholder="Total Course">
<input type="text" name="total_credit" placeholder="Total Credit" required>
<input required type="number" step="any" name="year" min="1" max="5" placeholder="Year"/>
<input required type="number" step="any" name="term"  min="1" max="2" placeholder="Term"/>
<input type="text" name="residential" placeholder="Residential Status (Abasik / Onabasik)">
<input type="text" name="credit_fee" placeholder="Per Credit Fee">
<input type="text" name="residential_fee" placeholder="Abasik (total+500 taka)">
<input type="text" name="other_fee" placeholder="Other Fee">

<input type="submit" value="OK" />
</form>
</div>




<!-- List  -->

<br><br>
  <div class="col-md-12">
  <div class="container">
    <div class="card text-center">
    <div class="card-header">
    </div>
    <div class="card-body">
      <h2 class="ti" style="color: white;"><strong>Term Fee</strong></h2>
      <table class="table">
        
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">TermFee Id</th>
        <th scope="col">Department Id</th>
        <th scope="col">Total credit</th>
        <th scope="col">Year</th>
        <th scope="col">Term</th>
        <th scope="col">Residential Status</th>
        <th scope="col">Residential Fee</th>
        <th scope="col">Total Fees</th>
        <th scope="col">Action</th>
        
      </tr>
    </thead>
    <tbody>

      <?php
      include("config.php");
      $i = 0;
          $sel="SELECT * FROM term_fee ORDER BY termfee_id ASC";
          $Q=mysqli_query($con,$sel);
          while($data=mysqli_fetch_assoc($Q)){
      ?>
      <tr>
        <th scope="row"><?php echo ++$i; ?></th>
        <td><?= $data['termfee_id']; ?></td>
        <td><?= $data['dept_id']; ?></td>
        <td><?= $data['total_credit']; ?></td>
        <td><?= $data['year']; ?></td>
        <td><?= $data['term']; ?></td>
        <td><?= $data['residential']; ?></td>
        <td><?= $data['residential_fee']; ?></td>
         <td><?= $data['total_fee']; ?></td>
        
        
        <td>
        <a href="?e=<?= $data['termfee_id']; ?>" class="btn btn-primary">Edit</a>
          <a href="deleteTermfee.php?d=<?= $data['termfee_id']; ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</div>


    </body>
    </html>