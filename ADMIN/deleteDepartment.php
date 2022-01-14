<?php
   include("config.php");
   
session_start();

if(!isset($_SESSION["userType"]))
{
    header("location:../login.php");
}


    $id=$_GET['d'];
    $del="DELETE FROM departments WHERE dept_id='$id'";
    mysqli_query($con,$del);
    header('Location: addDepartment.php');
?>