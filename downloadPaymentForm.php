
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
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="payment.css">

	<link rel="stylesheet" href="style.css">
	<script src="https://kit.fontawesome.com/a076d05399.js"></script>
	<title>Payment Form</title>
</head>
<body>
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
	 		$course_row = $course_info->fetch_assoc();
	 		$i = 0;

	 		$credit_fee = $mysqli->query("SELECT total_fee FROM `term_fee` WHERE `year`=$year and `term`=$term; ") or die($mysqli->error);
	 		$credit_fee = $credit_fee->fetch_assoc();

	 		// Total Fee Calculation
	 		if ($row['res_status'] == 'Yes') {
	 			$total_fee = $credit_fee['total_fee'] + 3300;
	 		}else{
	 			$total_fee = $credit_fee['total_fee'] + 3200;
	 		}

		}

	?>


	 
    <div>
	<div style="width:600px; box-shadow: 5px 5px 5px 5px #888888;" class="container">
		<table style="margin: auto;">
			<tr>
				<td><img width="60px" height="60px" src="images\NSTU-logo.png"></td>
				<td>
				<div class = "header-name">
				<h6 style="text-align: center; margin: 0 auto;">NOAKHALI SCIENCE AND TECHNOLOGY UNIVERSITY</h6>
				<p style="text-align: center; margin:auto;">Noakhali-3814, Bangladesh</p>
				<h6 style="text-align: center;margin: auto;">Term Fee Slip</h6>
				</div>
			</td>
			</tr>
		</table>
		<form>
			<div style="padding:10px 10px 10px 10px; align-content: center;  " class = "std-header-info">
				<div>
					 <label>Session</label>
					 <input style = "width: 110px;" type="text" id = 'session' placeholder="" value="<?php echo $row['session']; ?>" readonly>
					 <label style="padding-left: 200px;">Term</label>
					 <input style = "width: 130px;" type="text" id = 'term' placeholder="" value="<?php echo $row['Term']; ?>" readonly> <br>
				 </div>
				 <div>
					 <label>Serial No.</label>
					 <input style = "width: 95px;" type="text" id = 'serial' placeholder="" value="<?php echo ++$i;?>">
					 <label style="padding-left: 200px;">Date</label>
					 <input style = "width: 130px;" type="text" id = 'date' placeholder="" value="<?php echo date("m.d.y") ?>"> <br>
				 </div>
				  <div>
					 <label style="float:left; padding-right:35px;">Bank Account No</label>
					 <table style="font-size:8px; width:60%; float: left;" class="table table-bordered">
					 	<tr>
					 		<td class="bank_table">3</td>
					 		<td class="bank_table">2</td>
					 		<td class="bank_table">3</td>
					 		<td class="bank_table">0</td>
					 		<td class="bank_table">0</td>
					 		<td class="bank_table">6</td>
					 		<td class="bank_table">5</td>
					 		<td class="bank_table">3</td>
					 		<td class="bank_table">2</td>
					 		<td class="bank_table">6</td>
					 		<td class="bank_table">5</td>
					 		<td class="bank_table">4</td>
					 		<td class="bank_table">0</td>
					 	</tr>
					 </table>
				 
				 </div>
				 
				 <div>
				 	<label>Department Name</label>
					 <input style = "width: 75%; text-align:center;" type="text" id = 'dept_name' placeholder="" value="<?php echo $row['Department']; ?>">
					 
				 </div>
				 <div>
				 	<label>Hall Name</label>
					 <input style = "width: 85%; text-align:center;" type="text" id = 'hall_name' placeholder="" value="<?php echo $row['hall_id']; ?>">
				 </div>
				 <div>
				 	<label>Student Name</label>
					 <input style = "width: 80%; text-align:center;" type="text" id = 'std_name' placeholder="" value="<?php echo $row['Name']; ?>">
				 </div>
				 <div>
				 	<label>Father's Name</label>
					 <input style = "width: 80%; text-align:center;" type="text" id = 'father_name' placeholder="" value="<?php echo $row['father_name']; ?>">
				 </div>
				 <div>
				 	<label>Mother's Name</label>
					 <input style = "width: 79%; text-align:center; " type="text" id = 'mother_name' placeholder="" value="<?php echo $row['mother_name']; ?>">
				 </div>

				 <div>
				 	<label>Student ID</label>
					 <input style = "width: 79%; text-align:center; " type="text" id = 'student_id' placeholder="" value="<?php echo $row['Roll']; ?>">
				 </div>

				 <!-- <div>
				 	<label style="float: left;padding-right: 30px;">Roll No </label>
				 	<table style=" float: left; ">
				 		<tr>
				 			<td><input  class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 			<td><input class="roll_inp" type="number" name=""></td>
				 		</tr>
				 	</table>
				 </div> -->
				 <hr>
				 <br>
				 <table width="100%">
				 		<tr >
				 			<td colspan="2" width="70%"><?php
								if($chDiSig == ""){
									echo "<input  class='text' style='width:225px' type='text' name='provost' placeholder='' value=''>";
								}else{
									echo "<img src='images/{$chDiSig}' height='20px' width='100px'/>";
								}
							?></td>
							<td width="30%"><?php
								if($provSig == ""){
									echo "<input  class='text' style='width:335px;' type='text' name='co-ordinator' placeholder='' value=''>";
								}else{
									echo "<img src='images/{$provSig}' height='20px' width='100px'/>";
								}
							?></td>

				 		</tr>
				 	</table>
				 <div style="float: left;">

				 	<input type="text" name="provost" value="
								"> <br>
				 	<label style="display: block;text-align:center;">Provost(Signature)</label>
				 </div>
				 <div style="float: right;">
				 	<input type="text" name="chairman" value=""> <br>
				 	<label style="display: block; text-align:center;">Chairman(Signature)</label>
				 	<br/><br>
				 </div>
				 
				 <div>
				 	<table style="font-size: 12px" class="table table-bordered table-fee">
				 		<thead>
				 			<tr>
				 				<td>Money Deposit Sections</td>
				 				<td>Section Detail</td>
				 				<td>Amount</td>
				 				<td>Comments</td>
				 			</tr>
				 		</thead>

				 		<tbody>
				 			<tr>
				 				<td>Admission Fee</td>
				 				<td>Yearly</td>
				 				<td>1000.00</td>
				 				<td></td>
				 			</tr>
				 			<tr>
				 				
				 				<td>Credit Hour Fee</td>
				 				<td>Termly</td>
				 				<td><input   class = "term-fee" type="number" name="credit-fee" value="<?php echo $credit_fee['total_fee']?>" readonly></td>
				 				<td>Per credit hour fee is 50 Tk</td>
				 			</tr>
				 			<tr>
				 				
				 				<td>Student Welfare Function</td>
				 				<td>Yearly</td>
				 				<td>100.00</td>
				 				<td></td>
				 			</tr>
				 			<tr>
				 				<td>Seat Rent/ Electricity Charge</td>
				 				<td>Yearly</td>
				 				<td>1200.00</td>
				 				<td>Only for Residential Students</td>
				 			</tr>
				 			<tr>
				 				<td>Central Library Fee</td>
				 				<td>Yearly</td>
				 				<td>500.00</td>
				 				<td></td>
				 			</tr>
				 			<tr>
				 				<td>Seminar Library Fee</td>
				 				<td>Yearly</td>
				 				<td>200.00</td>
				 				<td></td>
				 			</tr>
				 			<tr>
				 				<td rowspan="2">Transport Fee</td>
				 				<td rowspan="2">Termly</td>
				 				<td>300.00</td>
				 				<td>For Residential Students</td>
				 			</tr>
				 			<tr>
				 				
				 				<td>200.00</td>
				 				<td>For Non-residential Students</td>
				 			</tr>

				 			<tr>
				 				
				 				<td>Late Fee</td>
				 				<td>Termly</td>
				 				<td><input class = "term-fee" type="number" name="late-fee"></td>
				 				<td></td>
				 			</tr>
				 			<tr>
				 				
				 				<td colspan="2">Total Fee</td>
				 				<td><input class = "term-fee" type="number" name="total-fee" value ="<?php echo $total_fee?>" readonly></td>
				 				<td></td>
				 			</tr>
				 		</tbody>
				 	</table>
				 </div>


				 <div>
				 	<p>We verify that the amount <input style="border-bottom: 2px solid black;" class = "term-fee" type="number" name="total-fee" value="<?php echo $total_fee?>" readonly> Tk is deposited.</p>
				 </div>
				 <br>

				 <div style="float: left;">
				 	<table width="100%">
				 		<tr>
				 			<td><?php
								if($chDiSig == ""){
									echo "<input  class='text' style='width:225px' type='text' name='provost' placeholder='' value=''>";
								}else{
									echo "<img src='images/{$chDiSig}' height='20px' width='100px'/>";
								}
							?></td>
				 		</tr>
				 	</table>
				 	<input type="text" name="provost"> <br>
				 	<label style="display: block;text-align:center;">Provost(Signature)</label>
				 </div>

				 <div style="float: right;">
				 	<table width="100%">
				 		<tr>
				 			<td><?php
								
							?></td>
				 		</tr>
				 	</table>
				 	<input type="text" name="cashier"> <br>
				 	<label style="display: block;text-align:center;">Cashier(Signature)</label>
				 	<br/><br>
				 </div>
				 
				 <br><br>
			</div>
			<br><br><br>
			
  			
			</form>
			
	    </div>
	</div>

</body>

<script>
		window.print();
	</script>
</html>


