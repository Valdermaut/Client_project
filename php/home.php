<?php 
include 'database.php';
session_start();
if($_SESSION['select']=="user")
include 'nav_user_home.php';
else if($_SESSION['select']=="company")
include 'nav_com_home.php';
else
include 'nav_no_login.php';
include 'search.php';

$select_education = mysqli_query($conn,"SELECT * from education_data");
$num_edu = mysqli_num_rows($select_education);
$select_skill = mysqli_query($conn,"SELECT * from skill_data");
$num_skill = mysqli_num_rows($select_skill);
$select_city = mysqli_query($conn,"SELECT * from city_data");
$num_city = mysqli_num_rows($select_city);
$select_role = mysqli_query($conn,"SELECT * from role_data");
$num_role = mysqli_num_rows($select_role);
$select_job = mysqli_query($conn,"SELECT * from job ");
?>

<html>
    <head>
            <link href="https://fonts.googleapis.com/css?family=Archivo|Roboto|Rubik&display=swap" rel="stylesheet">
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    </head>
    <body>
        <!--COMPANY DETAIL-->

<section id="com_det" style="text-align:center;align-items:center;"> 
        <center><div class="jumbotron mt-3" style="padding:0%;padding-bottom: 2%;">
                <div class="home_bar_head" >Search Job By Stream</div>
                <div class="row">
                    <div class="home_stream_box col-3">
                       <ul style="list-style: none;">
                           <?php $i=0; while($row_display_education = mysqli_fetch_assoc($select_education))
                           {
                           ?>
                        <a href="search_res.php?search=<?php echo $row_display_education['education'];?>"><li><?php echo $row_display_education['education']; $i++; 
                        if($i==4)
                        break;
                        ?></li>  
                           <?php }?></a>    
                       </ul>
                    </div>
                    <?php if($num_edu>4){?>
                    <div class="home_stream_box col-3">
                            <ul style="list-style: none;">
                            <?php  while($row_display_education = mysqli_fetch_assoc($select_education))
                           {
                           ?>
                        <a href="search_res.php?search=<?php echo $row_display_education['education'];?>"><li><?php echo $row_display_education['education']; $i++; 
                        if($i==8)
                        break;
                        ?></li>   
                           <?php } ?> </a> 
                            </ul>
                         </div>
                           <?php }?>
                           <?php if($num_edu>8){?>  
                         <div class="home_stream_box col-3">
                                <ul style="list-style: none;">
                                <?php while($row_display_education = mysqli_fetch_assoc($select_education))
                           {
                           ?>
                        <a href="search_res.php?search=<?php echo $row_display_education['education'];?>"><li><?php echo $row_display_education['education']; $i++; 
                        if($i==12)
                        break;
                        ?></li>   
                           <?php } ?> </a> 
                                </ul>
                             </div>
                             <?php }?>
                </div>        
                </div>
        </center>
        </section>
        
                <!--COMPANY DETAIL-->

<section id="com_det" style="text-align:center;align-items:center;"> 
        <center><div class="jumbotron mt-3" style="padding:0%;padding-bottom: 2%;">
                <div class="home_bar_head" >Find Job Vacancies</div>
                <div   >
                        <ul class="nav nav-pills mb-3 ml-5 mt-2" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active mr-5" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Role</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link mr-5" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Skill</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">City</a>
                                </li>
                              </ul><hr>
                              <div class="tab-content ml-4" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <div class="row">
                                <div class="col-4">
                                <?php $i=0;while($row_display_role = mysqli_fetch_assoc($select_role)){
                                        echo "<a href=search_res.php?search=".$row_display_role['role'].">".$row_display_role['role']."</a> <br>" ;
                                        $i++;
                                        if($i==8)
                                        break;}
                                        ?>
                                </div>
                                <div class="col-4">
                                <?php while($row_display_role = mysqli_fetch_assoc($select_role)){
                                         echo "<a href=search_res.php?search=".$row_display_role['role'].">". $row_display_role['role']."</a> <br>";
                                        $i++;
                                        if($i==16)
                                        break; }
                                        ?>
                                </div> 
                                <div class="col-4">
                                <?php while($row_display_role = mysqli_fetch_assoc($select_role)){
                                       echo "<a href=search_res.php?search=".$row_display_role['role'].">". $row_display_role['role']."</a> <br>";
                                        $i++;
                                        if($i==24)
                                        break;}
                                        ?>
                                </div>         
                                </div>
                                </div>
                                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                
                                <div class="row">
                                <div class="col-4">
                                <?php $i=0;while($row_display_skill = mysqli_fetch_assoc($select_skill)){
                                       echo "<a href=search_res.php?search=".$row_display_skill['skill'].">". $row_display_skill['skill']."</a> <br>";
                                        $i++;
                                        if($i==8)
                                        break;}
                                        ?>
                                </div>
                                <div class="col-4">
                                <?php while($row_display_skill = mysqli_fetch_assoc($select_skill)){
                                       echo "<a href=search_res.php?search=".$row_display_skill['skill'].">". $row_display_skill['skill']."</a> <br>";
                                       $i++;
                                        if($i==16)
                                        break; }
                                        ?>
                                </div> 
                                <div class="col-4">
                                <?php while($row_display_skill = mysqli_fetch_assoc($select_skill)){
                                       echo "<a href=search_res.php?search=".$row_display_skill['skill'].">". $row_display_skill['skill']."</a> <br>";
                                       $i++;
                                        if($i==24)
                                        break;}
                                        ?>
                                </div>         
                                </div>
                                
                                </div>
                                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                                
                                <div class="row">
                                <div class="col-4">
                                <?php $i=0;while($row_display_city = mysqli_fetch_assoc($select_city)){
                                       echo "<a href=search_res.php?search=".$row_display_city['city'].">". $row_display_city['city']."</a> <br>";
                                       $i++;
                                        if($i==8)
                                        break;}
                                        ?>
                                </div>
                                <div class="col-4">
                                <?php while($row_display_city = mysqli_fetch_assoc($select_city)){
                                       echo "<a href=search_res.php?search=".$row_display_city['city'].">". $row_display_city['city']."</a> <br>";
                                       $i++;
                                        if($i==16)
                                        break; }
                                        ?>
                                </div> 
                                <div class="col-4">
                                <?php while($row_display_city = mysqli_fetch_assoc($select_city)){
                                       echo "<a href=search_res.php?search=".$row_display_city['city'].">". $row_display_city['city']."</a> <br>";
                                       $i++;
                                        if($i==24)
                                        break;}
                                        ?>
                                </div>         
                                </div>       

                                </div>  
                </div>        
                </div>
        </center>
        </section>


        <section id="user_job" style="text-align:center;align-items:center;"> 
        <center><div style="text-align:left;width:70%;margin-left:5%"><h1 id="dboard_work">Matching Jobs</h1></div></center>
        <?php $i=0;while($row_display =  mysqli_fetch_assoc($select_job)){
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
                $i++;
                if($i==4)
                break;
                }?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>


<?php include 'footer.php'?>