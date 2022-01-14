<?php

include("config.php");

session_start();

if (isset($_SESSION["userType"])) {
    $userType = $_SESSION["userType"];

    if ($userType == "student") {
        $_SESSION['id'] = $id;
        header("location:student.php");
    } else if ($userType == "chairman") {
        header("location:chairman.php");
    } else if ($userType == "co-ordinator") {
        header("location:co_ordinator.php");
    } else if ($userType == "provost") {
        header("location:provost.php");
    } else if ($userType == "sectionofficer") {
        header("location:sectionOfficer.php");
    } else if ($userType == "register") {
        header("location:register.php");
    }
}


// Function for stop xss
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// echo("Connected");
if (isset($_POST['login'])) {
    $usertype = test_input($_POST['usertype']);
    $email = test_input($_POST['email']);
    $password = test_input(md5($_POST['password']));

    if ($usertype == "student") {
        $query = "SELECT * FROM `student_details` WHERE email = '$email' AND password='$password'";
        $result = mysqli_query($con, $query);
    } else {
        $query = "SELECT * FROM `multiuserlogin` WHERE usertype='" . $usertype . "' and email = '" . $email . "' and password='" . $password . "'";
        $result = mysqli_query($con, $query);
    }

    if ($result) {
        while ($row = mysqli_fetch_array($result)) {

            if ($usertype == "student") {
                $id = $row['Id'];
                $name = $row['Name'];
                $department = $row['Department'];
                $roll = $row['Roll'];

                $_SESSION["id"] = $id;
                $_SESSION["name"] = $name;
                $_SESSION["department"] = $department;
                $_SESSION["roll"] = $roll;
            } else {
                $id = $row['id'];

                $_SESSION["id"] = $id;
            }

            $_SESSION["userType"] = $usertype;


            echo '<script type="text/javascript">alert("You are login successfully as ' . $usertype . '")</script>';



            if ($usertype == "student") {
?>
                <script type="text/javascript">
                    window.location.href = "student.php"
                </script>
            <?php
            } else if ($usertype == "chairman") {
            ?>
                <script type="text/javascript">
                    window.location.href = "chairman.php"
                </script>
            <?php
            } else if ($usertype == "co-ordinator") {
            ?>
                <script type="text/javascript">
                    window.location.href = "co-ordinator.php"
                </script>
            <?php
            } else if ($usertype == "provost") {
            ?>
                <script type="text/javascript">
                    window.location.href = "provost.php"
                </script>
            <?php
            } else if ($usertype == "sectionofficer") {
            ?>
                <script type="text/javascript">
                    window.location.href = "sectionOfficer.php"
                </script>
            <?php
            } else if ($usertype == "register") {
            ?>
                <script type="text/javascript">
                    window.location.href = "register.php"
                </script>
<?php
            }
        }
    } else {
        echo 'no result';
    }
}

?>