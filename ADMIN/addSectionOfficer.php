
<?php
 include("config.php");

session_start();

if(!isset($_SESSION["userType"]))
{
    header("location:../login.php");
}


               if(!empty($_POST)){
                 $name = $_POST['name'];
                 $dept_id = $_POST['dept_id'];
                 $username = $_POST['username'];
                 $email = $_POST['email'];
                 $password =md5($_POST['password']);
                //  $file = $_POST['file'];



                 if (!empty($password)) { 

                  $dup = mysqli_query($con,"SELECT * FROM section_officers WHERE email = '$email'");
                  if(mysqli_num_rows($dup)>0){
                    echo '<script>alert("Duplicated Value")</script>';
                  }

                  else{
                     $insert="INSERT INTO section_officers (name, dept_id, username,email, password)
                     VALUES('$name', '$dept_id', '$username', '$email', '$password')";
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


    <title>Register Section Officer</title>
    <style>
        form { 
        margin: 0 auto; 
        width:40%;
        }
    </style>

  </head>
  <body>

<?php
include_once("education_nav.php");
?>
  
    
   
      




<!-- Form -->


<br><form method="post" action="">

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content" >
                    <div class="form-items" style="background-color: black;">
                        <h3>Section Officer</h3>
                        <p>Entry the Value</p>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="name" placeholder="Full Name" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                              <input class="form-control" type="text" name="dept_id" placeholder="Department Id" required>
                               <div class="valid-feedback">Please fill correctly!</div>
                               <div class="invalid-feedback">Id field cannot be blank!</div>
                           </div>

                           <div class="col-md-12">
                               <input class="form-control" type="text" name="username" placeholder="Username" required>
                               <div class="valid-feedback">Username field is valid!</div>
                               <div class="invalid-feedback">Username field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                                <input class="form-control" type="email" name="email" placeholder="E-mail Address" required>
                                 <div class="valid-feedback">Email field is valid!</div>
                                 <div class="invalid-feedback">Email field cannot be blank!</div>
                            </div>


                           <div class="col-md-12">
                              <input class="form-control" type="password" name="password" placeholder="Password" required>
                               <div class="valid-feedback">Password field is valid!</div>
                               <div class="invalid-feedback">Password field cannot be blank!</div>
                           </div>
                            
                  

                            <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
            </form>




            <!-- List of S.O. -->


 <br><br><br><br><br><br><br><br><br><br><br><br><br>
  <div class="col-md-12">
  <div class="container">
    <div class="card text-center">
    <div class="card-header">
      <h5 style="float: left;"></h5>
    </div>
    <div class="card-body">
      <h2 class="ti"><strong>Section Officers Details</strong></h2>
      <table class="table">
        
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Department id</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        
      </tr>
    </thead>
    <tbody>

      <?php
      include("config.php");
      $i = 0;
          $sel="SELECT * FROM section_officers ORDER BY dept_id ASC";
          $Q=mysqli_query($con,$sel);
          while($data=mysqli_fetch_assoc($Q)){
      ?>
      <tr>
        <th scope="row"><?php echo ++$i; ?></th>
        <td><?= $data['name']; ?></td>
        <td><?= $data['dept_id']; ?></td>
        <td><?= $data['username']; ?></td>
        <td><?= $data['email']; ?></td>
        
        <td>
          <a href="?e=<?= $data['dept_id']; ?>" class="btn btn-primary">Edit</a>
          <a href="?d=<?= $data['dept_id']; ?>" class="btn btn-primary"><i class="fa fa-trash" aria-hidden="true"></i></a> </td>
      </tr>
    <?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</div>




            <!--  -->






  

<div class="hero" style="background-image: url('images/BG_2.jpg');"></div>
  
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>


    <!-- script of form -->
    <script>(function () {
'use strict'
const forms = document.querySelectorAll('.requires-validation')
Array.from(forms)
  .forEach(function (form) {
    form.addEventListener('submit', function (event) {
      if (!form.checkValidity()) {
        event.preventDefault()
        event.stopPropagation()
      }

      form.classList.add('was-validated')
    }, false)
  })
})()
</script>
  </body>
</html>