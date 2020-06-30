<?php 
include 'database.php';
session_start();
if($_SESSION['select']=="company"){

$id = $_GET['id'];

$accept_query = mysqli_query($conn,"UPDATE job_applied SET status='accepted' where id=$id ");
if($accept_query){
echo "<script type='text/javascript'>alert('Successfully Accepted!');</script>";
header("location:cdasboard.php");
}
}
else("location:home.php");
?>