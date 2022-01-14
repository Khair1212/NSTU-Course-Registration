<?php

   include("config.php");

   session_start();

    if(!isset($_SESSION["userType"])){
    header("location:Login.php");
    exit();
    }

$servername="localhost";
$username="root";
$password="";
$dbname="multiuser";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// echo "Connected";

// include_once 'dbconfig.php';


if(isset($_POST['btn-upload']))
{    
 $session = $_POST['session'];  
      
 $file = rand(1000,100000)."-".$_FILES['file']['name'];
 $file_loc = $_FILES['file']['tmp_name'];
 $file_size = $_FILES['file']['size'];
 $file_type = $_FILES['file']['type'];
 $folder="uploads/";
 
 // new file size in KB
 $new_size = $file_size/1024;  
 // new file size in KB
 
 // make file name in lower case
 $new_file_name = strtolower($file);
 // make file name in lower case
 
 $final_file=str_replace(' ','-',$new_file_name);

 if(move_uploaded_file($file_loc,$folder.$final_file))
 {
  
  $sql="INSERT INTO chairman_file(session, file,type,size) VALUES('$session','$final_file','$file_type','$new_size')";
  mysqli_query($conn, $sql);
  ?>


  <script>
  alert('successfully uploaded');
        window.location.href='send_co.php?success';
        </script>
  <?php
 }
 else
 {
  ?>
  <script>
  alert('error while uploading file');
        window.location.href='send_co.php?fail';
        </script>
  <?php
 }
}
?>