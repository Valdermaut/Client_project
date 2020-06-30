<?php
include 'nav_user_home.php';
include 'database.php';
session_start();
if($_SESSION['select']=="user"){
$email = $_SESSION['email'];
$select_query=mysqli_query($conn,"SELECT * from user where email='$email'");
$row= mysqli_fetch_assoc($select_query);
$select_role_data = mysqli_query($conn,"SELECT * from role_data");
$select_skill_data = mysqli_query($conn,"SELECT * from skill_data");
$select_city_data = mysqli_query($conn,"SELECT * from city_data");
if(isset($_POST['submit'])){
        if($_POST['skill']!="" || $_POST['city']!="" || $_POST['role']!="" ){       
$search_sql = mysqli_query($conn,"SELECT * from job WHERE " ."skill LIKE "."'%". implode("%' OR skill LIKE '%", $_POST['skill'])."%' AND city LIKE "."'%". implode("%' OR city LIKE '%", $_POST['city'])."%' AND role LIKE "."'%". implode("%' OR role LIKE '%", $_POST['role'])."%'  ");
}

}

//applied job 

?>



<html>
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Archivo|Roboto|Rubik&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>

<!--USER DETAIL-->

<section id="user_det" style="text-align:center;align-items:center;"> 
<center><div class="jumbotron mt-3" >
                <div class="dboard_user ">
                       <!-- <img src="test.jpg" alt="" id="dboard">-->
                        <div id="dboard_user_det"> 
                                <h1 id="dboard_name"><?php echo $row['fname']." ".$row['mname']." ".$row['lname']; ?></h1>
                                <p style="background: #178BDD;width:100%;"><?php echo $email; ?> </p>
                                <p style="font-weight: 300;font-size: 22px;margin-top:-1%;"><?php echo $row['mobile']; ?></p>
                                <p style ="font-weight:300 ;font-size:16px;margin-top:-1%;"><a href="editprofile.php?email=<?php echo $email;?>"> + Edit Profile</a> </p>                                
                                </div>
                        </div>
                </div>
</center>
</section>

<!--USER WORK EXPERIENCE-->

<section id="user_work" style="text-align:center;align-items:center;"> 
        <center><div class="jumbotron mt-3" >
                <div id="dboard_work_det"> 
                        <h1 id="dboard_work">Educational Detail</h1>
                        <hr style="width:70%;">
                        <div class="det_big"><?php echo $row['edu_detail']; ?></div>
                        <div class="det_big">//Here put the education tag after making education as checkbox</div>
                        </div><br>
                <div id="dboard_work_det"> 
                        <h1 id="dboard_work">Profile links</h1>
                        <hr style="width:70%;">
                        <div class="det_big"><mark style="color:whitesmoke;background:#178BDD;">Facebook</mark> : <?php echo $row['fb_url']; ?></div>
                        <div class="det_big"><mark style="color:whitesmoke;background:#178BDD">LinkedIn</mark> : <?php echo $row['linkedin_url']; ?> </div>
                        </div>        
        </div></center>
        </section>

<!--JOB FILTERS-->

<section id="job_filter" style="text-align:center;align-items:center;"> 
        <center><div class="jumbotron mt-3">
                <div id="dboard_job_fil"> 
                        <h1 id="dboard_work">Job Filters</h1>
                        <hr style="width:70%;">
                        <br>
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div style="display:flex;justify-content: space-around;text-align:left;">
                                <div class="btn-group">
                                        <button type="button" class="btn" style="background: #178BDD;color: whitesmoke;border-radius:2px;">Skill</button>
                                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background:lightgray;border-radius:2px;">
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                        <?php $i=1; while($row_skill = mysqli_fetch_assoc($select_skill_data)){
                                                    ?>
                                                <input type="checkbox" name="skill[]" value = "<?php echo $row_skill['skill']; ?>" ><?php echo $row_skill['skill']; ?><br>
                                                <?php
                                                 }?>
                                        </div>
                                      </div>

                                      <div class="btn-group">
                                        <button type="button" class="btn" style="background: #178BDD;color: whitesmoke;border-radius:2px;">City</button>
                                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background:lightgray;border-radius:2px;">
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                        <?php $i=1; while($row_city = mysqli_fetch_assoc($select_city_data)){
                                                    ?>
                                                <input type="checkbox" name="city[]" value = "<?php echo $row_skill['city']; ?>" ><?php echo $row_skill['city']; ?><br>
                                                <?php
                                                 }?>
                                        </div>
                                      </div>

                                      <div class="btn-group">
                                        <button type="button" class="btn" style="background: #178BDD;color: whitesmoke;border-radius:2px;">Post</button>
                                        <button type="button" class="btn dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background:lightgray;border-radius:2px;">
                                          <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu">
                                        <?php $i=1; while($row_role = mysqli_fetch_assoc($select_role_data)){
                                                    ?>
                                                <input type="checkbox" name="role[]" value = "<?php echo $row_role['role']; ?>" ><?php echo $row_role['role']; ?><br>
                                                <?php
                                                 }?>
                                        </div>
                                      </div>

                                      <div class="btn-group">
                                        <input type="submit" name ="submit" class="btn" style="background: #178BDD; color: whitesmoke;border-radius:2px;">                                  </button>
                                      </div>
                                </div>
                                </form>
                        </div>
                </div><br>
                
        </div></center>
        </section> 
        
        <!--MATCHING JOBS-->

        
        <section id="user_job" style="text-align:center;align-items:center;"> 
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
                        <a class="job_card_btn" href="job_detail.php?id=<?php echo $row_display['id']; ?>">Apply Now</a>
                        </form>
                        </div>
                        </div><?php 
                
                }?>

        <!--JOB APPLIED-->
        <?php 
$select_query_job=mysqli_query($conn,"SELECT * from job_applied where email='$email'; ");


?>
<section id="job_app" style="text-align:center;align-items:center;">
                <center><div style="text-align:left;width:70%;"><h1 id="dboard_work_flat">Job Applied</h1></div></center> 
                <center><div class="jumbotron mt-3" style="padding:0%;border: 0.4px solid lightgray;box-sizing: border-box;border-radius: 5px;">
                        <table style="width:100%;text-align:center;">
                           <tr style="background: #178BDD;color:whitesmoke;line-height:40px;box-shadow: 0 2px 3px gray;">
                              <th>Job</th>
                              <th>Company</th>
                              <th>Salary</th>
                              <th>Location</th>
                              <th>Status</th>
                              <th></th>
                           </tr>
                           <?php while($row_job=mysqli_fetch_assoc($select_query_job)){ ?>
                         
                         <tr>
                             <td><?php echo $row_job['job_title'];?></td>
                           <td><?php echo $row_job['cname'];?></td>
                           <?php $id = $row_job['job_id']; }
                           
                           $select_job = mysqli_query($conn,"SELECT * from job where id='$id' "); ?>
                           <?php while($row_job_1=mysqli_fetch_assoc($select_job)){ ?>
                             <td><?php echo $row_job_1['salary'];?></td>
                             <td><?php echo $row_job_1['city'];?></td>
                             <td><?php
                            $select_job_staus = mysqli_query($conn,"SELECT * from job_applied where job_id='$id' "); 
                            $row_status=mysqli_fetch_assoc($select_job_staus);
                             echo $row_status['status'];?></td>
                             <td><a href="delete_entry.php?id=<?php echo $id;?>">Delete Entry</a></td>
                         </tr>
                       <?php }?>
                        </table>      
                </div></center>
                </section>


</body>
</html>

<?php 

}
else if($_SESSION['select']=="company")
header("location:cdasboard.php");
else
header("location:signin.php");
include 'footer.php';
?>