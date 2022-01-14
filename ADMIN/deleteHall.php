<?php
   include("config.php");

    session_start();

    if(!isset($_SESSION["userType"]))
    {
        header("location:../login.php");
    }

    $id=$_GET['d'];
    $del="DELETE FROM hall WHERE hall_id='$id'";
    mysqli_query($con,$del);
    header('Location: hall.php');
?>