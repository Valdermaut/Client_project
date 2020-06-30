<?php 
include 'database.php';
session_start();
if($_SESSION['select']=="user"){

$id = $_GET['id'];
$delete_query = mysqli_query($conn,"DELETE from job_applied where job_id =$id ");
header("location:dasboard.php");}
else
header("location:home.php");
?>