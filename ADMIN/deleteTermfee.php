<?php
   include("config.php");
   
    session_start();

    if(!isset($_SESSION["userType"]))
    {
        header("location:../login.php");
    }

    $id=$_GET['d'];
    $del="DELETE FROM term_fee WHERE termfee_id='$id'";
    mysqli_query($con,$del);
    header('Location:termFee.php');
?>