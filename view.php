<?php

include("config.php");
include("header.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "multiuser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

//echo "Connected";

//include("config.php");

?>


<!DOCTYPE html>
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->

<head>
   <title>Notice</title>
   <link rel="stylesheet" href="upload.css">
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="table.css">


</head>

<body>




   <div id="header">
      <label>Emergency Notice for Student</label>
   </div>
   <div id="body">

      <table>
         <tr>
            <th colspan="2">Important Notice<label></label></th>
            <!-- <a href="uploadForm.php">upload new files...</a> -->
         </tr>
         <tr>
            <td id="file_name">File Name</td>
            <!-- <td>File Type</td>
    <td>File Size(KB)</td> -->
            <td id="view_file">View</td>
         </tr>

         <?php
         $sql = "SELECT * FROM uploadform";
         $result_set = mysqli_query($conn, $sql);
         while ($row = mysqli_fetch_array($result_set)) {
         ?>
            <tr>
               <td><?php echo $row['file'] ?></td>
               <!-- <td><?php echo $row['type'] ?></td>
        <td><?php echo $row['size'] ?></td> -->
               <td><a href="images/<?php echo $row['file'] ?>" target="_blank">view file</a></td>
            </tr>
         <?php
         }
         ?>
      </table>

   </div>

</body>

</html>