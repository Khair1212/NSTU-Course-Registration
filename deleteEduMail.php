<?php
   include("config.php");

   session_start();

    if(!isset($_SESSION["userType"])){
    header("location:Login.php");
    exit();
    }
    else{
    $userType = $_SESSION["userType"];
    if($userType != "education")
    { 
        session_destroy();
        session_unset();
        header("location:Login.php");
    }
    }
    $id=$_GET['d'];
    $del="DELETE FROM mail WHERE too ='$id'";
    mysqli_query($con,$del);
    header('Location: educationMail.php');
?>