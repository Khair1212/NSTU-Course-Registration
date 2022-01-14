 <?php

// session_start();

// unset($_session['email']);

// header("location: Login.php");

session_start();
session_destroy();
session_unset();
header("location:index.php");


?> 