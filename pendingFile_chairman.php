<?php

include("config.php");

session_start();

if (!isset($_SESSION["userType"])) {
  header("location:Login.php");
  exit();
} else {
  $userType = $_SESSION["userType"];
  if ($userType == "co-ordinator" || $userType == "chairman") {
    //code goes there;
  } else {
    session_destroy();
    session_unset();
    header("location:Login.php");
  }
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "multiuser";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (isset($_POST['approve'])) {
  $id = $_POST['id'];
  $year = $_POST['year'];
  $approvedFor = "batch0" . $year;
  $approveId = $_SESSION["id"];

  $userType = $_SESSION["userType"];

  if ($userType == "co-ordinator") {
    $sql = "UPDATE student_details SET approved_for = '$approvedFor' , co_c_approve_stat = 1 , co_c_approve_by = '$approveId' WHERE id = '$id'";
  } else if ($userType == "chairman") {
    $sql = "UPDATE student_details SET approved_for = '$approvedFor' , ch_di_approve_stat = 1 , ch_di_approve_by = '$approveId' WHERE id = '$id'";
  }

  if (mysqli_query($conn, $sql)) {
?>
    <script>
      alert("Successfully Approved");
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("Successfully Approved");
    </script>
<?php
  }
}

?>
<?php
if (isset($_POST['approve_all'])) {
  
  $approveId = $_SESSION["id"];
  $userType = $_SESSION["userType"];

  if ($userType == "co-ordinator") {
    $sql = "UPDATE student_details SET  co_c_approve_stat = 1 , co_c_approve_by = '$approveId' WHERE co_c_approve_stat = 1 AND ch_di_approve_stat = 0 AND prov_approve_stat = 0 ";
  } else if ($userType == "chairman") {
    $sql = "UPDATE student_details SET ch_di_approve_stat = 1 , ch_di_approve_by = '$approveId' WHERE co_c_approve_stat = 1 AND ch_di_approve_stat = 0 AND prov_approve_stat = 0";
  }

  if (mysqli_query($conn, $sql)) {
?>
    <script>
      alert("Successfully Approved");
    </script>
  <?php
  } else {
  ?>
    <script>
      alert("Successfully Approved");
    </script>
<?php
  }
}
?>

<!DOCTYPE html>
<!-- <html xmlns="http://www.w3.org/1999/xhtml"> -->


<head>
  <title>Notice</title>
  <link rel="stylesheet" href="upload.css" type="text/css" />
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="table.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>
  <style>
    #body {
      margin-top: 30px;
    }

    .topic-btn {
      border-radius: 50px 50px 50px 50px !important;
      background-color: #008080 !important;
      color: white;
      text-decoration: none;
    }
  </style>
</head>


<body>


  <div>
    <?php
    include_once("Chairman_nav.php");
    ?>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-md-10 mx-auto">
        <div class="filter">
          <div class="jumbotron p-1 text-center ">
            <?php
            $year_id = 0;
            if (isset($_GET['year_id'])) {
              $year_id  = $_GET['year_id'];
            }
            if ($year_id == 0) {
            ?>
              <a name="" id="" class="btn btn-primary topic-btn" disabled href="pendingFile_chairman.php?year_id=0" role="button">All</a>
            <?php
            } else {
            ?>
              <a name="" id="" class="btn btn-primary" href="pendingFile_chairman.php?year_id=0" role="button">All</a>

            <?php
            }
            ?>
            <?php
            for ($i = 1; $i <= 4; $i++) {
            ?>
              <?php
              if ($year_id == $i) {
              ?>

                <a name="" id="" class="btn btn-primary topic-btn m-1" href="pendingFile_chairman.php?year_id=<?php echo $i ?>" role="button"><?php echo "Year $i" ?></a>

              <?php
              } else {
              ?>
                <a name="" id="" class="btn btn-primary m-1" href="pendingFile_chairman.php?year_id=<?php echo $i ?>" role="button"><?php echo "Year $i" ?></a>
            <?php
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="body">

    <table width="80%" border="1">
      <tr>
        <th colspan="5">Pending<label></label></th>
        <!-- <a href="uploadForm.php">upload new files...</a> -->
      </tr>
      <tr>
        <th>Name</th>
        <th>Roll</th>
        <th>Resisdential Status</th>
        <th>Total Credit</th>
        <th>Action</th>
      </tr>

      <?php

      $increment = false;
      if ($year_id == 0) {
        $increment = true;
        $year_id = $year_id + 1;
      }
      for ($year = $year_id; $year <= 4; $year++){
        $userType = $_SESSION["userType"];
        // $year = $rsltRow['Year'];

        $sql = "";

        if ($userType == "co-ordinator") {
          $sql = "SELECT `Id`,`Name`,`Roll`,`res_status`,`Year`, (SELECT SUM(credit) FROM courses WHERE courses.year= student_details.`Year`) AS sum_credit 
          FROM `student_details` WHERE co_c_approve_stat = 0 AND ch_di_approve_stat = 0 AND prov_approve_stat = 0 AND Year = '$year' AND (batch01 = '2' OR batch02 = '2' OR batch03 = '2' OR batch04 = '2') ORDER BY YEAR, batch01, batch02, batch03, batch04";
        }
        if ($userType == "chairman") {
          $sql = "SELECT `Id`,`Name`,`Roll`,`res_status`,`Year`, (SELECT SUM(credit) FROM courses WHERE courses.year= student_details.`Year`) AS sum_credit 
          FROM `student_details` WHERE co_c_approve_stat = 1 AND ch_di_approve_stat = 0 AND prov_approve_stat = 0 AND Year = '$year' AND (batch01 = '2' OR batch02 = '2' OR batch03 = '2' OR batch04 = '2') ORDER BY YEAR, batch01, batch02, batch03, batch04";
        }

        $result_set = mysqli_query($conn, $sql);
        $i = 0;
        while ($row = mysqli_fetch_array($result_set)) {
          if ($i == 0) {
      ?>
            <tr>
              <td colspan="5">Pending Students from Year: <?php echo $year; ?></td>
            </tr>
          <?php
          }
          ?>
          <tr>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['Roll']; ?></td>
            <td><?php echo $row['res_status']; ?></td>
            <td><?php echo $row['sum_credit']; ?></td>
            <td>
              <form action="" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['Id']; ?>" />
                <input type="hidden" name="year" value="<?php echo $year; ?>" />
                <button value = "View" style="padding:5px;"> <a class = 'view' style = "color:black;};"  href = "viewStudentInfo.php?id=<?php echo $row['Id']?>"> View </a> </button>              
                <input type="submit" name="approve" value="Approve" style="padding:5px;">
              </form>
            </td>
          
          </tr>
      <?php
          $i++;
        }
        if (!$increment) {
          break;
        }
      
      }
      ?>
      <tr style = "background-color: transparent; border:hidden">
            <td colspan="5" style= "text-align:center;">
              <form action = "" method = "POST">
                <input type="submit" name="approve_all" value="Approve All" style="padding:5px;">
              </form> 
            </td>
        </tr>
    </table>

  </div>

  <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>


</html>