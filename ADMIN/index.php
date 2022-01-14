
  <?php

include("config.php");

session_start();

if(isset($_SESSION["userType"]))
{
  $userType = $_SESSION["userType"];

  if($userType == "admin")
  {
    header("location:home.php");
  }
  
}

// Function

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

// echo("Connected");
if(isset($_POST['login'])){
    $usertype =test_input($_POST['usertype']);
    $email =test_input($_POST['email']);
    $password =test_input (md5($_POST['password']));





    $query = "SELECT * FROM `multiuserlogin` WHERE usertype='".$usertype."' and email = '".$email."' and password='".$password."'";
    $result = mysqli_query($con, $query);

    if($result){
    while($row=mysqli_fetch_array($result)){
      $_SESSION["userType"] = $usertype;
    echo'<script type="text/javascript">alert("You are login successfully as ' .$row['usertype'].'")</script>';
  
    
    if($usertype=="admin"){
        ?>
        <script type="text/javascript">
        window.location.href="home.php"</script>
        <?php 
        }

        
        }
    }  
        else{
        echo 'no result';
        }
        }
         
        ?>  







<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Template</title>
  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="login.css">

<style>
  body{background-color:#054013;}
</style>

</head>
<body>
  <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">
          <div class="col-md-5">
            <img src="images/16243-nstu.jpg" alt="login" class="login-card-img">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <div class="brand-wrapper">
                <img src="images/16243-nstu.jpg" alt="logo" class="logo">
              </div>
              <p class="login-card-description"><h2><strong>NCR Admin Login</strong></h2></p>
                  <div class="form-group">
                   <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

</br>
<table>
<tr>
<td><select name="usertype">
<option value="admin" name="admin" selected>Admin</option>
</select>
 </td>
</tr>
</table>
                <div class="form-group mb-4"> 
                    <label for="email" class="sr-only">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address" required>
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                  </div>
                  <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use & Privacy policy</a><br>
                  <a href="#!"><strong>Copyright@IIT,NSTU</strong></a>
                </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>
</html>



