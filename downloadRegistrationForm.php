
<?php
 include("config.php");

 session_start();

 if(!isset($_SESSION["userType"])){
   header("location:Login.php");
   exit();
 }
 else{
   $userType = $_SESSION["userType"];
   if($userType != "student")
   { 
     session_destroy();
     session_unset();
     header("location:Login.php");
   }
 }

 if(isset($_POST['submit'])){
	$id = $_SESSION["id"];
	$year = $_POST['year'];
	
	$columnName = "batch0".$year;

	$sql="UPDATE student_details SET $columnName = 2 WHERE id='$id';";
    
	if(mysqli_query($con,$sql)){
		echo '<script> 
		alert("Succesfully applied");
		window.location.href="student.php"	
		</script>';
	}else{
		echo '<script> 
		alert("Something Wrong here! Please Try Again");
		window.location.href="Registrationform.php";
		</script>';
	}
 }

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="download_form.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<title>Registration Form</title>

	<style>
		a:hover
		{
			background-color: green;
			color: white;
		}

		@media print {
			@page { margin: 0; }
			body { margin: 1.6cm; }
			}
	</style>

</head>
<body style="background-color: white">
	<?php
		if (isset($_SESSION["id"])) {
			$id = $_SESSION["id"];
			$mysqli = new mysqli('localhost', 'root', '', 'multiuser') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * from student_details WHERE student_details.id= '$id'") or die($mysqli->error);
			$row = $result->fetch_array();
	 		$name = $row['Name'];
	 		$roll = $row['Roll'];
	 		$dept = $row['Department'];
	 		$year = $row['Year'];
			$hall = $row['hall_id'];
			$coSigId = $row['co_c_approve_by'];
			$chDiSigId = $row['ch_di_approve_by'];
			$provSigId = $row['prov_approve_by'];

			$cosig = "";
			if($coSigId>0){
				$coSigrslt = $mysqli->query("SELECT signature FROM multiuserlogin WHERE id = '$coSigId'") or die($mysqli->error);
	 			$cosigData = $coSigrslt->fetch_array();
				$cosig = $cosigData['signature'];
			}

			$chDiSig = "";
			if($chDiSigId>0){
				$chDiSigIdrslt = $mysqli->query("SELECT signature FROM multiuserlogin WHERE id = '$chDiSigId'") or die($mysqli->error);
	 			$chDiSigIdData = $chDiSigIdrslt->fetch_array();
				$chDiSig = $chDiSigIdData['signature'];
			}

			$provSig = "";
			if($provSigId>0){
				$provSigIdrslt = $mysqli->query("SELECT signature FROM multiuserlogin WHERE id = '$provSigId'") or die($mysqli->error);
	 			$provSigIdData = $provSigIdrslt->fetch_array();
				$provSig = $provSigIdData['signature'];
			}

			$columnName = "batch0".$year;

			$isApplied = 0;
			$rslt = $mysqli->query("SELECT $columnName FROM student_details WHERE id = '$id' ") or die($mysqli->error);
	 		$apply = $rslt->fetch_array();
			
			$isApplied = $apply[$columnName];
			
	 		$term = $row['Term'];
	 		$session = $row['session'];
	 		


	 		$course_info = $mysqli->query("SELECT * from courses WHERE courses.year= '$year' and courses.term= '$term' ") or die($mysqli->error);
	 		$course_row = $course_info->fetch_array();


	 		$result_info = $mysqli->query("SELECT * from student_results WHERE student_id= '$roll'") or die($mysqli->error);
	 		$result_row = $result_info->fetch_array();

	 		//echo $result_row['cgpa'];
		}

	?>

	
	<div style="width:670px; padding:30px; box-shadow: 5px 5px 5px 5px #888888;" class="container">
		<table style="margin: auto;">
			<tr>
				<td><img width="60px" height="60px" src="images\NSTU-logo.png"></td>
				<td>
				<div class = "header-name">
				<h6 style="text-align: center; margin: 0 auto;">NOAKHALI SCIENCE AND TECHNOLOGY UNIVERSITY</h6>
				<p style="text-align: center; margin:auto;">Noakhali-3814, Bangladesh</p>
				<h6 style="text-align: center;margin: auto;">COURSE REGISTRATION FORM</h6>
				</div>
			</td>
			</tr>
		</table>
		<hr>
		

	
		<form action="" method="POST">
			<div style=" align-content: center;" class = "std-header-info">
				 <!-- <div>
					 <label>Name</label>
					 <input class="text" style = "width: 365px; text-align: center;" type="text" id = 'name' placeholder="" value="<?php echo $row['Name']; ?>" readonly>
					 <label>Roll</label>
					 <input class="text" style = "width: 160px; text-align: center;" type="text" id = 'roll' placeholder="" value="<?php echo $row['Roll']; ?>" readonly> <br>
				 </div>
				 <div>
				 	<label>Department</label>
					 <input class="text" style = "width: 237px; text-align: center;" type="text" id = 'department' placeholder="" value="<?php echo $row['Department']; ?>" readonly>
					 <label>Institute/Faculty</label>
					 <input class="text" style = "width: 170px; text-align: center;" type="text" id = 'institute' placeholder="" value="<?php echo $row['Department']; ?>" readonly>
					 <br/>
				 </div>

				 <div>
					 <label>Year</label>
					 <input class="text" style = "width: 120px; text-align: center;" type="text" id = 'year' placeholder="" value="<?php echo $row['Year']; ?>" readonly>
					 <input type="hidden" name="year" value="<?php echo $row['Year']; ?>" />

					 <label>Term</label>
					 <input class="text" style = "width: 150px; text-align: center;" type="text" id = 'term' placeholder="" value="<?php echo $row['Term']; ?>" readonly>

					 <label>Session</label>
					 <input class="text" style = "width: 200px; text-align: center;" type="text" id = 'session' placeholder="" value="<?php echo $row['session']; ?>" readonly>
				 </div>
				 <br/> -->


				 <!-- <table width="100%">
					<tr>
						<td colspan="2" > <b> Name: </b> <?php echo $row['Name'];?></td>
 
						<td width="50%" >Roll:  <?php echo $row['Roll']; ?></td>

					</tr>
					<br>
					<tr>
						<td width="50%" colspan="2" > Department: <?php echo $row['Department']; ?></td>
						<td width="50%">Institute/Faculty: <?php echo $row['institute']; ?></td>
				</tr>
					<tr>
						<td width="30%">Year: <?php echo $row['Year']; ?></td> 
						<td width="30%">Term: <?php echo $row['Term']; ?></td>
						<td width="40%">Session:<?php echo $row['session']; ?></td>
					</tr>
				</table> -->
				<div>
					 <label>Name</label>
					 <input class="text" style = "width: 55%; text-align: center;" type="text" id = 'name' placeholder="" value="<?php echo $row['Name']; ?>" readonly>
					 <label>Roll</label>
					 <input class="text" style = "width: 35%; text-align: center;" type="text" id = 'roll' placeholder="" value="<?php echo $row['Roll']; ?>" readonly> <br>
				 </div>
				 <div>
				 	<label>Department</label>
					 <input class="text" style = "width: 50%; text-align: center;" type="text" id = 'department' placeholder="" value="<?php echo $row['Department']; ?>" readonly>
					 <label>Institute/Faculty</label>
					 <input class="text" style = "width: 26%; text-align: center;" type="text" id = 'institute' placeholder="" value="<?php echo $row['institute']; ?>" readonly>
					 <br/>
				 </div>

				 <div>
					 <label>Year</label>
					 <input class="text" style = "width: 27%; text-align: center;" type="text" id = 'year' placeholder="" value="<?php echo $row['Year']; ?>" readonly>
					 <input type="hidden" name="year" value="<?php echo $row['Year']; ?>" />

					 <label>Term</label>
					 <input class="text" style = "width: 27%; text-align: center;" type="text" id = 'term' placeholder="" value="<?php echo $row['Term']; ?>" readonly>

					 <label>Session</label>
					 <input class="text" style = "width: 29%; text-align: center;" type="text" id = 'session' placeholder="" value="<?php echo $row['session']; ?>" readonly>
				 </div>
				 <br><br>
				 <div class="table-responsive">
				 	<table class="table table-bordered" style="background-color:white;">
				 		<thead>
				 			<tr>
					 			<th>Course Code</th>
					 			<th>Course Title</th>
					 			<th>Credits</th>
					 			<th>Remarks</th>
				 			</tr>
				 		</thead>
				 		<tbody>
				 			<?php while ($course_row = $course_info->fetch_assoc()): ?> 
				 			<tr>
				 				<td><?php echo $course_row['course_code'];?></td>
				 				<td><?php echo $course_row['course_name'];?></td>
				 				<td><?php echo $course_row['credit'];?></td>
				 				<td></td>
				 			</tr>
				 			<?php endwhile?>
				 		</tbody>
				 	</table>
				 </div>
				 <br><br>
				 <div>
					 <table style="font-size: 11px;" class="table table-bordered" id="table" style="background-color:white">
					 	<tr class="borderless">
					 		<td style="border: none;"></td>
					 		<td style="border: none;"></td>
					 		<td colspan="2">Year 1</td>
					 		<td colspan="2">Year 2</td>
					 		<td colspan="2">Year 3</td>
					 		<td colspan="2">Year 4</td>
					 		<td colspan="2">Year 5</td>
					 	</tr>
					 	<tr style="font-size: 8px">
					 		<td style="border: none;"></td>
					 		<td style="border: none;"></td>
					 		<td>Term-I</td>
					 		<td>Term-II</td>
					 		<td>Term-I</td>
					 		<td>Term-II</td>
					 		<td>Term-I</td>
					 		<td>Term-II</td>
					 		<td>Term-I</td>
					 		<td>Term-II</td>
					 		<td>Term-I</td>
					 		<td>Term-II</td>
					 	</tr>
					 
					 	<tr>
					 		<td colspan="2">Credit <br> Completed </td> 
					 		<td>22</td>
					 		<td>23</td>
					 		<td>24</td>
					 		<td>20</td>
					 		<td>23</td>
					 		<td></td>
					 		<td></td>
					 		<td></td>

					 		
					 		<td></td>
					 		<td></td>
					 	</tr>
					 	<tr>
					 		<td colspan="2">GPA</td>
					 		<td>3.23</td>
					 		<td>3.21</td>
					 		<td>3.43</td>
					 		<td>3.52</td>
					 		<td>3.12</td>
					 		<td></td>
					 		<td></td>
					 		<td></td>
					 		<td></td>
					 		<td></td>

					 	</tr>

					 </table>
				 </div>


				 
				 <label>Credits taken in current term</label>
				 <input class="text" style="width:100px; text-align:center" type="text" name="credits" value="23" placeholder="">
				 <hr>
				<br><br>
				<table width="100%">
					<tr>
						<td>Course Co-ordinator :</td>
						<td colspan="3">
							<?php
								if($cosig == ""){
									echo "<input class='text' style='width:335px' type='text' name='co-ordinator' placeholder='' value=''>";
								}else{
									echo "<img src='images/{$cosig}' height='20px' width='100px'/>";
								}
							?>
						</td>
					</tr>
					<tr>
						<td width="30%">Provost : </td>
						<td width="30%">
							<?php
								if($chDiSig == ""){
									echo "<input  class='text' style='width:225px' type='text' name='provost' placeholder='' value=''>";
								}else{
									echo "<img src='images/{$chDiSig}' height='20px' width='100px'/>";
								}
							?>
						</td>
						<td width="20%">Hall : </td>
						<td width="20%"><input class="text" style="width:90px;" type="text" name="hall" placeholder="" value="<?php echo $hall ?>"></td>
					</tr>
					<tr>
						<td>Director/ Chairman :</td>
						<td colspan="3">

							<?php
								if($provSig == ""){
									echo "<input  class='text' style='width:335px;' type='text' name='co-ordinator' placeholder='' value=''>";
								}else{
									echo "<img src='images/{$provSig}' height='20px' width='100px'/>";
								}
							?>
						</td>
					</tr>
				</table>



			</div>
			
		
	</div>
	</form>
  	<br><br><br>
    
    <script>
		window.print();
	</script>

</body>
</html>