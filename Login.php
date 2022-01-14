<?php
include_once("login_config.php");
include_once("login_header.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Login</title>

  <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="login.css">




</head>

<body>

  <main class="d-flex align-items-center py-3 py-md-0">
    <div class="container">
      <div class="card login-card">
        <div class="row no-gutters">

          <div class="col-md-7 card_area">
            <div class="card-body">

              <p class="login-card-description">Sign into your account</p>
              <!-- <form action="#!"> -->
              <div class="form-group">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                  </br>
                  <label for="usertype">Select User Type</label>
                  <table>
                    <tr>
                      <td><select name="usertype">
                          <option value="student" name="student">Student</option>
                          <option value="chairman" name="Chairman">Director/Chairman</option>
                          <option value="co-ordinator" name="co_ordinator">Course Co-ordinator</option>
                          <option value="provost" name="provost">Hall Provost</option>
                          <!-- <option value="education" name="education">Education</option> -->
                          <option value="register" name="register">Register</option>
                          <!-- <option value="admin" name="admin">Admin</option> -->
                          <option value="sectionofficer" name="sectionofficer">Section Officer</option>
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
          <div class="col-md-4 logo">
            <img src="images/nstu_logo.png" alt="login" class="logo_img">
          </div>
        </div>

      </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>