<?php 
include 'database.php';
session_start();
if($_SESSION['select']=="company"){

$id = $_GET['id'];

$delete_query = mysqli_query($conn,"DELETE from job_applied where id='$id' ");
if($delete_query){
echo "<script type='text/javascript'>alert('Successfully Rejected!');</script>";
header("location:cdasboard.php");

}
}
else
header("location:home.php");

?>