<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
   <title>ADMIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
<style>
    a:hover
      {
      background-color: green;
      }
</style>

  </head>
  <body>
      <div>
    <nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">NCR</label>
      <ul>
        <li><a href="user.php">SignUp</a></li>
        <li><a href="alluser.php">Users</a></li>
        <li><a href="addDepartment.php">Departments</a></li>
        <li><a href="hall.php">Hall</a></li>
        <li><a href="termFee.php">Term Fee</a></li>
        <li><a href="#">Feedback</a></li>
        <li><a href="profile.html">Profile</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
      </nav>
      </div>
    <!-- <section></section> -->




    <footer>
    <link rel="stylesheet" href="footer.css">
      <div class="main-content">
        <div class="left box">
          <h2>About us</h2>
          <div class="content">
            <p>Online Course Registration of NSTU is a smart and digital way to form fill-up, pay credit fees and course fees for all semester and also students can apply for backlog application and don't have to go office tangible for any of these.</p>
            <div class="social">
              <a href="#"><span class="fab fa-facebook-f"></span></a>
              <a href="#"><span class="fab fa-twitter"></span></a>
              <a href="#"><span class="fab fa-instagram"></span></a>
              <a href="#"><span class="fab fa-youtube"></span></a>
            </div>
          </div>
        </div>

        <div class="center box">
          <h2>Address</h2>
          <div class="content">
            <div class="place">
              <span class="fas fa-map-marker-alt"></span>
              <span class="text">Noakhali, Sonapur</span>
            </div>
            <div class="phone">
              <span class="fas fa-phone-alt"></span>
              <span class="text">016*****</span>
            </div>
            <div class="email">
              <span class="fas fa-envelope"></span>
              <span class="text">nstu.edu@gmail.com</span>
            </div>
          </div>
        </div>

        <div class="right box">
          <h2>Contact us</h2>
          <div class="content">
            <form action="#">
              <div class="email">
                <div class="text">Email *</div>
                <input type="email" required>
              </div>
              <div class="msg">
                <div class="text">Feedback *</div>
                 <textarea rows="2" cols="25" required></textarea>
              </div>
              <div class="btn">
                <button type="submit">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </footer>
    </body>
</html>
