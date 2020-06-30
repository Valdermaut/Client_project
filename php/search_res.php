<?php
include 'database.php';
session_start();
if($_SESSION['select']=="user")
include 'nav_user_home.php';
else
include 'nav_no_login.php';

$search = $_GET['search'];
//$search = $_SESSION['job_title'];
//$city = $_SESSION['city'];

if($search!=""){
$search_sql = mysqli_query($conn,"SELECT * from job where job_title LIKE '%$search%' OR cname LIKE '%$search%' OR city LIKE '%$search%' OR skill LIKE '%$search%' OR education LIKE '%$search%'");
}
?>

<html>
    <head>
    <link href="https://fonts.googleapis.com/css?family=Archivo|Roboto|Rubik&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 
    </head>
    <body>
    <section id="user_job" style="text-align:center;align-items:center;margin-top:2%;"> 
        <center><div style="text-align:left;width:70%;margin-left:5%"><h1 id="dboard_work">Matching Jobs</h1></div></center>
        <?php while($row_display =  mysqli_fetch_assoc($search_sql)){
                ?> 
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
        <center><div class="jumbotron mt-3" style="padding:0%;padding-top:1%;">
                         <div align="left" style="width:100%">
                             <h1 class="title_blue"><?php echo $row_display['job_title'];?></h1>
                             <p class="small_grey"><?php echo $row_display['cname'];?></p>    
                         <div align="left" style="padding-left:2.5%">
                             <div class="job_card_icon">   
                             <div class="btn" style="background: whitesmoke;color:#178BDD"><i class="material-icons">location_city</i><?php echo $row_display['city'];?></div>
                             <div class="btn" style="background: whitesmoke;color:#178BDD"><i class="material-icons">access_time</i><?php echo $row_display['experience'];?></div>
                             <div class="btn" style="background: whitesmoke;color:#178BDD "><i class="material-icons">attach_money</i><?php echo $row_display['salary'];?></div>
     
                        </div>
                             <p class="com_det"><?php echo $row_display['job_detail'];?> </p>   
                        <p class="com_det">
                              <b>Skills :</b> <?php echo $row_display['skill'];?>  
                        </p>      
                        </div>
                        </div>
                        <div class="card-footer text-muted" style="text-align:right;">
                        <input type="submit" value="Apply Now" name="apply" class="job_card_btn">
                        </form>
                        </div>
                        </div><?php 
                
                }?>

    </body>
</html>

<?php 
include 'footer.php';
?>