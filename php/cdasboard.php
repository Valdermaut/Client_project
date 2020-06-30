<?php
include 'database.php';
session_start();
include 'nav_com_home.php';
if($_SESSION['select']=="company"){
$email = $_SESSION['email'];
$select_query=mysqli_query($conn,"SELECT * from company where email='$email'");
$row= mysqli_fetch_assoc($select_query);
$select_role_data = mysqli_query($conn,"SELECT * from role_data");
$select_skill_data = mysqli_query($conn,"SELECT * from skill_data");


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
                      <!--  <img src="test.jpg" alt="" id="dboard">-->
                        <div id="dboard_user_det"> 
                                <h1 id="dboard_name"><?php echo $row['cname'] ?></h1>
                                <p style="background: #178BDD;width:100%;"><?php echo $email; ?> </p>
                                <p style="font-weight: 300;font-size: 22px;margin-top:-1%;"><?php echo $row['mobile']; ?></p>
                                <p style ="font-weight:300 ;font-size:16px;margin-top:-1%;"><a href="ceditprofile.php?email=<?php echo $email ;?>"> + Edit Profile</a> </p>                                
                                </div>
                        </div>
                </div>
</center>
</section>

<!--USER WORK EXPERIENCE-->

<section id="user_work" style="text-align:center;align-items:center;"> 
        <center><div class="jumbotron mt-3" >
                <div id="dboard_work_det"> 
                        <h1 id="dboard_work">Company Profile</h1>
                        <hr style="width:70%;">
                        <div class="det_big"><?php echo $row['cprofile']; ?></div>
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

                                      <div class="row" id="blacklistgrid">
                                          <div class="col-10" id="skill">
                                          <div class="input-group ">
                                            <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Experience</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="experience" >
                                                <option selected >Years</option>
                                                <?php $i=1; while($i<=50){
                                                    ?>
                                                <option value=<?php $i ?>  ><?php echo $i?></option>
                                                <?php
                                                 $i=$i+1; }?>
                                            </select>
                                            </div>
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
        </div></center>
        </section> 
        
        <!--MATCHING CANDIDATE-->
        
        <?php 
        $select_user_applied = mysqli_query($conn,"SELECT * from job_applied where cname = '$row[cname]' ");
        
        ?>
        <section id="user_job" style="text-align:center;align-items:center;"> 
        <center><div style="text-align:left;width:70%;margin-left:5%"><h1 id="dboard_work">Matching Candidates</h1></div></center>
        <?php while($row_com_sort = mysqli_fetch_assoc($select_user_applied)){
                $select_user = mysqli_query($conn,"SELECT * from user where email = '$row_com_sort[email]' ");
                //$row = mysqli_fetch_assoc($select_user);
                if(isset($_POST['submit'])){
                        $search_sql = mysqli_query($conn,"SELECT * from user WHERE skill LIKE "."'%". implode("%' OR '%", $_POST['skill'])."%' AND email='$row_com_sort[email]'" );
                        $row_disp = mysqli_fetch_assoc($search_sql);
                        if($row_disp['email']){   
                ?> 
        <center><div class="jumbotron mt-3" style="padding:0%;padding-top:1%;">
                         <div align="left" style="width:100%">
                             <h1 class="title_blue"><?php echo $row_disp['fname']." ".$row_disp['mname']." ".$row_disp['lname'];?></h1>
                             <p class="small_grey"><?php echo $row_disp['email']; ?></p>    
                         <div align="left" style="padding-left:2.5%">
                             <div class="job_card_icon">   
     
                        </div>
                              
                        <p class="com_det">
                              <b>Skills : </b><?php echo $row_disp['skill'];?><br>
                              <b>Educational Detail : </b><?php echo $row_disp['edu_detail'];?>  
                        </p>
                        <p class="com_det">
                              <b>Mobile : </b><?php echo $row_disp['mobile'];?>
                        </p>
                          
                        </div>
                        <p class="small_grey"><b>Facebook : </b><a href = https://<?php echo $row_disp['fb_url']; ?>><?php echo $row_disp['fb_url']; ?></a></p>
                        <p class="small_grey"><b>LinkedIn : </b><a href = https://<?php echo $row_disp['linkedin_url']; ?>><?php echo $row_disp['linkedin_url']; ?></a></p>          
                        </div>
                        <div class="card-footer text-muted" style="text-align:right;">
                        <a href="accept_user.php?id=<?php echo $row_com_sort['id']; ?>"><button class="job_card_btn btn-success text-light">Accept</button></a>
                        <a href="reject_user.php?id=<?php echo $row_com_sort['id']; ?>"><button class="job_card_btn btn-danger text-light">Reject</button></a>
                        </div>
                        
                        </div><?php
                        }}}
                        ?>

        <!--JOB APPLIED-->
<?php 
$select_query_job=mysqli_query($conn,"SELECT * from job where cname='$row[cname]'; ");

?>
<section id="job_app" style="text-align:center;align-items:center;">
                <center><div style="text-align:left;width:70%;"><h1 id="dboard_work_flat">Job Posted</h1></div></center> 
                <center><div class="jumbotron mt-3" style="padding:0%;border: 0.4px solid lightgray;box-sizing: border-box;border-radius: 5px;">
                        <table style="width:100%;text-align:center;">
                           <tr style="background: #178BDD;color:whitesmoke;line-height:40px;box-shadow: 0 2px 3px gray;">
                              <th>Job</th>
                              <th>Location</th>
                              <th>Role</th>
                              <th></th>
                           </tr>
                          <?php while($row_job_posted=mysqli_fetch_assoc($select_query_job)){ ?>
                         
                           <tr>
                               <td><?php echo $row_job_posted['job_title'];?></td>
                               <td><?php echo $row_job_posted['city'];?></td>
                               <td><?php echo $row_job_posted['role'];?></td>
                               <td><a href="update_job.php?<?php $_SESSION['id']=$row_job['id'];?>">Edit Entry</a></td>
                           </tr>
                         <?php }?>
                        </table>      
                </div></center>
                </section>


                
</body>
</html>
<?php }
else 
header("location:signin.php");
include 'footer.php';
?>