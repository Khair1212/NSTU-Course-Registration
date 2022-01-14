<?php

include("config.php");

  session_start();

  if(!isset($_SESSION["userType"])){
  header("location:Login.php");
  exit();
  }
  else
  {
    $userType = $_SESSION["userType"];
    if($userType != "co-ordinator")
    { 
        session_destroy();
        session_unset();
        header("location:Login.php");
    }
  }

$servername="localhost";
$username="root";
$password="";
$dbname="multiuser";

$conn = mysqli_connect($servername, $username,$password, $dbname);


?>


<!DOCTYPE html>
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->
<head>
<title>Notice</title>
<link rel="stylesheet" href="upload.css" type="text/css" />
<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="table.css">
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>


<div>
    <?php
    include_once("co_ordinator_nav.php");
    ?>
      </div>



<div id="body">

 <table>
    <tr>
    <th colspan="5">Chairman's Notice<label></label></th>
    <!-- <a href="uploadForm.php">upload new files...</a> -->
    </tr>
    <tr>
    <td>File Name</td>
    <td>Session</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>

    <?php
 $sql="SELECT * FROM chairman_file";
 $result_set = mysqli_query($conn,$sql);
 while($row=mysqli_fetch_array($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['file'] ?></td>
        <td><?php echo $row['session'] ?></td>
        <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td>
        <td><a href="uploads/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
    </table>
    
</div>

<?php
include_once("footer.php");
?>
</body>
</html>