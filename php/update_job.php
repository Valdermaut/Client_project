<?php

include 'database.php';
session_start();
include 'nav_com_home.php';
if($_SESSION['select']=="company"){

$id=$_SESSION['id'];
$i=0;
//fetch job detail posted already
$query_select_job = mysqli_query($conn, "SELECT * from job where id = '$id'");
$row_job = mysqli_fetch_assoc($query_select_job);
$email = $row_job['email'];

//fetch company details
$query_select = mysqli_query($conn, "SELECT * from company where email = '$email'");
$row = mysqli_fetch_assoc($query_select);
$cname= $row['cname']; 

if(isset($_POST['submit'])){
  extract($_POST);
 $skills = implode("-",$skill);
 $roles = implode("-",$role);
 $educations = implode("-",$education);
 $citys = implode("-",$city);
 print_r($_POST);


$update_query = mysqli_query($conn, "UPDATE job SET cname='$cname',job_title='$job_title',city='$citys',job_detail='$job_detail',skill='$skills',experience='$experience',salary='$salary',role='$roles',education='$educations' where id='$id' "); 

$exist_skill = explode("-",$row_job['skill']);
print_r($exist_skill);
unset($skill[0]);
$temp_skill = $skill;
$skill = array_merge($exist_skill,$temp_skill);
print_r($skill);

$num_skill = count($skill);
    for($i=0; $i<$num_skill; $i++){
    $select_skill_query = mysqli_query($conn, "SELECT skill from skill_data where skill='$skill[$i]' ");
    $num_check = mysqli_num_rows($select_skill_query);
    if($num_check==0){  
    $insert_skill_query = mysqli_query($conn, "INSERT INTO skill_data(skill) VALUES('$skill[$i]') ");
    }
  }

  $num_role = count($role);
  for($i=0; $i<$num_role; $i++){
  $select_role_query = mysqli_query($conn, "SELECT role from role_data where role='$role[$i]' ");
  $num_check = mysqli_num_rows($select_skill_query);
  if($num_check==0){  
  $insert_role_query = mysqli_query($conn, "INSERT INTO role_data(role) VALUES('$role[$i]') ");
  }
}

$num_education = count($education);
for($i=0; $i<$num_education; $i++){
$select_education_query = mysqli_query($conn, "SELECT education from education_data where education='$education[$i]' ");
$num_check = mysqli_num_rows($select_skill_query);
if($num_check==0){  
$insert_education_query = mysqli_query($conn, "INSERT INTO education_data(education) VALUES('$education[$i]') ");
}
}

$num_city = count($city);
for($i=0; $i<$num_city; $i++){
$select_city_query = mysqli_query($conn, "SELECT city from city_data where city='$city[$i]' ");
$num_check = mysqli_num_rows($select_skill_query);
if($num_check==0){  
$insert_city_query = mysqli_query($conn, "INSERT INTO city_data(city) VALUES('$city[$i]') ");
}
}  
  unset($_SESSION['id']);
}

?>

<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Archivo|Roboto|Rubik&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#btnAdd").click(function(){
    $("#skill").append(' <input type="text" class="form-control" placeholder="work domain" name="skill[]" id="row2"><br>');
  });
  $("#btn2").click(function(){
    $("ol").append("<li>Appended item</li>");
  });
});

function getData(e) {
    e.preventDefault();
}

$(document).ready(function(){
  $("#btnAdd2").click(function(){
    $("#role").append(' <input type="text" class="form-control" placeholder="Role/Post" name="role[]" id="row2"><br>');
  });
});

function getData(e) {
    e.preventDefault();
}


$(document).ready(function(){
  $("#btnAdd3").click(function(){
    $("#education").append(' <input type="text" class="form-control" placeholder="Education" name="education[]" id="row2"><br>');
  });
});

function getData(e) {
    e.preventDefault();
}

$(document).ready(function(){
  $("#btnAdd4").click(function(){
    $("#city").append(' <input type="text" class="form-control" placeholder="City" name="city[]" id="row2"><br>');
  });
});

function getData(e) {
    e.preventDefault();
}
</script>
</head>
<body>

<!--COMPANY DETAIL-->

<section id="com_det" style="text-align:center;align-items:center;"> 
<center><div class="jumbotron mt-3">
                <div class="dboard_user ">
                                <div id="dboard_user_det"> 
                                <h1 id="form_head">Post Job Here!</h1>
                                <br>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                                        <div class="row">
                                          <div class="col-3">
                                            <label for="inputEmail4">Company Name</label>
                                            <input type="text" class="form-control" placeholder="First name" name="cname" value="<?php echo $cname ;?>" readonly>
                                            </div>
                                          </div>
                                         <br>
                                          <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Job Title</label>
                                                  <input type="text" class="form-control" placeholder="Job Title" name="job_title" value="<?php echo $row_job['job_title'] ;?>">
                                                </div>
                                                </div>

                                        <br>
                                        <div class="row">
                                                <div class="col-3" id="city">
                                                  <label for="inputEmail4">City/Location</label>
                                                  <input type="text" class="form-control" placeholder="City " name="city[]" value="<?php echo $row_job['city'] ;?>"> <br>
                                        </div>
                                        <br>
                                        <div class="col-3" id="city">
                                            <label for="inputEmail4">Add </label><br>
                                          <input type="button" id="btnAdd4" value="+" class="btn btn-primary" >
                                       </div>
                                        </div> 
                                        <br>

                                        <div class="row">
                                                <div class="col-7">
                                                  <label for="inputEmail4">Job Details</label>
                                                  <textarea name="job_detail" placeholder="Detailed Information about Job" cols="30" rows="10" class="form-control col-15" value=""><?php echo $row_job['job_detail'] ;?></textarea>
                                                </div>
                                                </div>
                                        <br>
                                        <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                            <label for="inputEmail4">Skill required</label>
                                            <input type="text" class="form-control" placeholder="work domain" id="row2" name="skill[]" value="<?php echo $row_job['skill'] ;?>" > <br>
                                       </div>
                                       <div class="col-3" id="skill">
                                            <label for="inputEmail4">Add </label><br>
                                          <input type="button" id="btnAdd" value="+" class="btn btn-primary" >
                                       </div>
                                       </div> 
                                    
                                        <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                          <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01">Experience</label>
                                            </div>
                                            <select class="custom-select" id="inputGroupSelect01" name="experience" value="<?php echo $row_job['experience'] ;?>">
                                                <option selected >Years</option>
                                                <?php $i=1; while($i<=50){
                                                    ?>
                                                <option value="<?php echo $i ?>"  > <?php echo $i?> </option>
                                                <?php
                                                 $i=$i+1; }?>
                                            </select>
                                            </div>
                                            </div>
                                       </div> 

                                        <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                            <label for="inputEmail4">Salary Per Annum</label>
                                            <input type="text" class="form-control" placeholder="Salary per annum" id="row2" name="salary" value="<?php echo $row_job['salary'] ;?>"><br>
                                       </div>
                                       <div class="col-3" id="role">
                                            <label for="inputEmail4">Role</label>
                                            <input type="text" class="form-control" placeholder="Role/Post" id="row2" name="role[]" value="<?php echo $row_job['role'] ;?>"><br>
                                       </div>
                                       <div class="col-3" id="role">
                                            <label for="inputEmail4">Add </label><br>
                                          <input type="button" id="btnAdd2" value="+" class="btn btn-primary" >
                                       </div>
                                       </div> 
                                        
                                       <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="education">
                                            <label for="inputEmail4">Education</label>
                                            <input type="text" class="form-control" placeholder="Salary per annum" id="row2" name="education[]" value="<?php echo $row_job['education'] ;?>"><br>
                                       </div>
                                       <div class="col-3" id="education">
                                            <label for="inputEmail4">Add </label><br>
                                          <input type="button" id="btnAdd3" value="+" class="btn btn-primary" >
                                       </div>
                                       </div>
                                       <input type="submit" value="Submit" name="submit" class="btn btn-primary">
                                        </form>
                                        </div>
                                        </div>
                                      
                                </div>
                        </div>
                </div>
</center>
</section>
        </form>
    </body>
</html>

<?php }
else
header("location:signin.php");
include 'footer.php';
?>
