<nav>
      <input type="checkbox" id="check">
      <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
      </label>
      <label class="logo">N<span style="color:red;">C</span>R</label>
      <ul>
        <!-- <li><a class="active" href="student.php">Home</a></li> -->
        <!-- <li><a href="student.php">Home</a></li> -->
        <li><a href="view.php">Notification</a></li>
        <!-- start -->
        <?php
            if($provSig != "" && $chDiSig != "" && $cosig != ""):
        ?>
            <li><a href="RegistrationForm.php">Download Form</a></li>
            <li><a href="payment_form.php">Download Payment Reciept</a></li>
        <?php
        else:
        ?>
            <li><a href="Registrationform.php">Form Fillup</a></li>
        <?php
          endif;
        ?>


          <?php
          if($provSig != "" && $chDiSig != "" && $cosig != ""){
          ?>
              
          <?php
            }else{
          ?>
            
        <?php
          }
        ?>

        <!-- end -->
        
        <li><a href="studentContact.php">Contact</a></li>
        <!-- <li><a href="#">Feedback</a></li> -->
        <li><a href="studentProfile.php">Profile</a></li>
        <li><a href="logout.php">Log Out</a></li>
      </ul>
      </nav>