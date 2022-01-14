<?php
 include("config.php");
 include('header.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></src=>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="profile.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <title>Profile</title>
</head>
<body>


<!-- connection -->
<?php
		if (isset($_SESSION["id"])) {
			$id = $_SESSION["id"];
			$mysqli = new mysqli('localhost', 'root', '', 'multiuser') or die(mysqli_error($mysqli));
			$result = $mysqli->query("SELECT * from student_details WHERE student_details.id= '$id'") or die($mysqli->error);
			$row = $result->fetch_array();
	 		$name = $row['Name'];
	 		$roll = $row['Roll'];
	 		$dept = $row['Department'];
            $email = $row['Email'];
            $res_status = $row['res_status'];
            $hall_id = $row['hall_id'];
            $cgpa = $row['cgpa'];
	 		$year = $row['Year'];
	 		$term = $row['Term'];
	 		$session = $row['session'];}

?>
<!--  -->



 



    <div class="container emp-profile">
        <form method="post" action="">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="" alt="Student's Image"/>
                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="file"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                                <h2>
                                <input class="text" style = "width: 360px; border:none;" type="text" id = 'name' placeholder="" value="<?php echo $row['Name']; ?>" readonly>  
                                </h2>
                                <h4>
                                <input class="text" style = "width: 360px;  border:none;" type="text" id = 'department' placeholder="" value="<?php echo $row['Department']; ?>" readonly>
                                </h4>
                                <h6>
                                <input class="text" style = "width: 180px;  border:none;" type="text" id = 'year' placeholder="" value="Year: <?php echo $row['Year']; ?>" readonly>
                                <input class="text" style = "width: 180px;  border:none;" type="text" id = 'term' placeholder="" value="Term: <?php echo $row['Term']; ?>" readonly>
                                </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
 
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                <img src="images/nstu_logo.png" alt="logo" style = "width: 180px;" class="logo">
                    <!-- <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/> -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <h6>Result</h6>
                        <input class="text" style = "width: 200px; border:none;" type="text" id = 'cgpa' placeholder="" value="<?php echo $row['cgpa']; ?>" readonly><br/>
                        
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>User Id</label>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <p><input class="text" style = "width: 300px;  border:none;" type="text" id = 'email' placeholder="" value="<?php echo $row['Email']; ?>" readonly></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><input class="text" style = "width: 300px;  border:none;" type="text" id = 'roll' placeholder="" value="<?php echo $row['Roll']; ?>" readonly></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Residential Status</label>
                                        </div>
                                        <div class="col-md-6">
                                        <p><input class="text" style = "width:300px; border:none;" type="text" id = 'res_status' placeholder="" value="<?php echo $row['res_status']; ?>" readonly></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Hall No</label>
                                        </div>
                                        <div class="col-md-6">
                                        <p><input class="text" style = "width: 300px; border:none;" type="text" id = 'hall_id' placeholder="" value="<?php echo $row['hall_id']; ?>" readonly></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Office Mobile</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>01812121212</p>
                                        </div>
                                    </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Experience</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Expert</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Hourly Rate</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>10$/hr</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Total Projects</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>230</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>English Level</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>Expert</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Availability</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>6 months</p>
                                        </div>
                                    </div>
                            <!-- <div class="row">
                                <div class="col-md-12">
                                    <label>Your Bio</label><br/>
                                    <p>Your detail description</p>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>           
    </div>
</body>
</html>


