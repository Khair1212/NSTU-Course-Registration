

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

      $dup = mysqli_query($con,"SELECT * FROM director WHERE dept_id = '$dept_id'");
                  if(mysqli_num_rows($dup)>0){
                    echo '<script>alert("Duplicated Value")</script>';
                  }

        else {         
        $insert="INSERT INTO director (dept_name, dept_id)
        VALUES('$dept_name', '$dept_id')";
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
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="addSectionOfficer.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>


    <title></title>

    <style>
    form { 
    margin: 0 auto; 
    width:40%;
    }
    </style>
  </head>
  <body>


    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
    
    <header class="site-navbar" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-11 col-xl-2">
            <h1 class="mb-0 site-logo"><a href="index.html" class="text-white mb-0"><strong>NCR</strong></a></h1>
          </div>
          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="home.php"><span>Home</span></a></li>
                <li><a href="user.php"><span>SignUp</span></a></li>
                <li class="has-children">
                  <a href=""><span>Users</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="faculty.php">Faculty Member(s)</a>
                      <ul>
                    <li><a href="director.php">Director(s)</a></li>
                    <li><a href="addProvost.php">Provost(s)</a></li>
                  </ul>
                  </li>
                  <li><a href="addSectionOfficer.php">Section_Officer(s)</a></li>
                  </ul>
                </li>

               <li class="has-children">
                  <a href=""><span>Sectors</span></a>
                  <ul class="dropdown arrow-top">
                    <li><a href="addDepartment.php">Department(s)</a></li>
                    <li><a href="Hall.php">Hall(s)</a></li>
                  </ul>
                </li>

                <li><a href="termfee.php"><span>Term Fee</span></a></li>
                <li><a href="feedback.php"><span>Feedback</span></a></li>
                <li><a href=""><span>Profile</span></a></li>
                <li><a href="logout.php"><span>Log out</span></a></li>
              </ul>
            </nav>
          </div>


          <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-white"><span class="icon-menu h3"></span></a></div>

          </div>
        </div>
      </div> 
    </header>

    <!-- <div class="hero" style="background-image: url('images/nstu.jpg');"></div> -->




   <!-- Form -->
   <br><form method="post" action="">

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Directors</h3>
                        <p>Enter Authenticate information</p>
                        <form class="requires-validation" novalidate>

                            <div class="col-md-12">
                               <input class="form-control" type="text" name="dept_name" placeholder="Department Name" required>
                               <div class="valid-feedback">Name field is valid!</div>
                               <div class="invalid-feedback">Name field cannot be blank!</div>
                            </div>

                            <div class="col-md-12">
                              <input class="form-control" type="text" name="dept_id" placeholder="Department Id" pattern ="[A-Za-z0-9_]{4,8}" required>
                               <div class="valid-feedback">Please fill correctly!</div>
                               <div class="invalid-feedback">Id field cannot be blank!</div>
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





    <!-- List Directors -->
    <br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br>
  <div class="col-md-12">
  <div class="container">
    <div class="card text-center">
    <div class="card-header">
      <h5 style="float: left;"></h5>
    </div>
    <div class="card-body">
      <h2 class="ti"><strong>Director(s)</strong></h2>
      <table class="table">
        
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Dept. Id</th>
        <th scope="col">Department Name</th>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Password</th>
       
        
      </tr>
    </thead>
    <tbody>

      <?php
      include("config.php");
      // $con = mysqli_connect("localhost", "root","","multiuser") or die ("Connection Failed");
      $i = 0;
          // $sel="SELECT * FROM courses ORDER BY dept_id ASC";
          $sel = "SELECT fm.*, dir.dept_name
          FROM faculty_members fm, director dir
          WHERE fm.dept_id=dir.dept_id";

          $Q=mysqli_query($con,$sel);
          while($data=mysqli_fetch_assoc($Q)){
      ?>
      <tr>
        <th scope="row"><?php echo ++$i; ?></th>
        <td><?= $data['name']; ?></td>
        <td><?= $data['dept_id']; ?></td>
        <td><?= $data['dept_name']; ?></td>
        <td><?= $data['username']; ?></td>
        <td><?= $data['email']; ?></td>
        <td><?= $data['password']; ?></td>
        
        
      </tr>

    <?php } ?>
    </tbody>
  </table>
  </div>
  </div>
</div>
  


    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>