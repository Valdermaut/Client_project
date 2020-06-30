<?php
session_start();
include 'database.php';
include 'nav_user_home.php';

$id = $_GET['id'];

if($id){
$select_job = mysqli_query($conn,"SELECT * from job where id='$id'");
$row_display =  mysqli_fetch_assoc($select_job);
$email = $_SESSION['email'];
if(isset($_POST['apply'])){

    $insert_req = mysqli_query($conn,"INSERT into job_applied(email,cname,job_title,job_id) VALUES('$email','$row_display[cname]','$row_display[job_title]','$id') ");
    if($insert_req){
        echo "<script type='text/javascript'>alert('Successfully Applied!');</script>";  
        
    }
    
}  


?>

<html>
    <head>
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Archivo|Roboto|Rubik&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
    </head>
    <body>
            <section id="user_det" style="text-align:center;align-items:center;">
                    <center><div style="text-align:left;width:70%;margin-top:2%;margin-left:5%"><h1 id="dboard_work">Detail Page</h1></div>
                    </center> 
                    <center><form method="POST" action="job_detail.php?id=<?php echo $id;?>"> 
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
                                            </div>
                                            </div>
                                            <div class="card-footer text-muted" style="text-align:right;">
                                            <input type="submit" value="Apply Now" name="apply" class="job_card_btn">
                                            </form>
                    </center>
                    </section> 


                    <section id="user_job" style="text-align:center;align-items:center;"> 
                            <center><div style="text-align:left;width:70%;margin-left:5%"><h1 id="dboard_work">Job Description</h1></div></center>
                                    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                            <center><div class="jumbotron mt-3" style="padding:0%;padding-top:1%;">
                                             <div align="left" style="width:100%">   
                                             <div align="left" style="padding-left:2.5%">
                                                 <div class="job_card_icon">   
                                            </div>
                                                 <p class="com_det"><?php echo $row_display['job_detail'];?> </p>   
                                            <p class="com_det">
                                                  <b>Skills :</b> <?php echo $row_display['skill'];?>  
                                            </p>      
                                            </div>
                                            </div>
                                            </form> 
    </body>
</html>

<?php }
else if($id==NULL)
header("location:home.php");
?>