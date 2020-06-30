  <?php

include 'database.php';
session_start();
include 'nav_com_home.php';
if($_SESSION['select']=="company"){

//var declaration
$i=0;
$email= $_SESSION['email'];

$query_select_job = mysqli_query($conn, "SELECT * from job where email = '$email'");
$row_job = mysqli_fetch_assoc($query_select_job);

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

    $insert_query = mysqli_query($conn, "INSERT INTO job(cname,job_title,city,job_detail,skill,experience,salary,role,education,email) VALUES('$cname','$job_title','$citys','$job_detail','$skills','$experience','$salary','$roles','$educations','$email')");
    
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
    
    if($insert_query){
      echo "succeess";
  }
  else{
    echo "failed";
  }
  
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
                                                  <input type="text" class="form-control" placeholder="Job Title" name="job_title" >
                                                </div>
                                                </div>

                                        <br>
                                        <div class="row">
                                                <div class="col-3" id="city">
                                                  <label for="inputEmail4">City/Location</label>
                                                  <input type="text" class="form-control" placeholder="City " name="city[]" > <br>
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
                                                  <textarea name="job_detail" placeholder="Detailed Information about Job" cols="30" rows="10" class="form-control col-15" value=""></textarea>
                                                </div>
                                                </div>
                                        <br>
                                        <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                            <label for="inputEmail4">Skill required</label>
                                            <input type="text" class="form-control" placeholder="work domain" id="row2" name="skill[]" > <br>
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

                                        <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                            <label for="inputEmail4">Salary Per Annum</label>
                                            <input type="text" class="form-control" placeholder="Salary per annum" id="row2" name="salary" ><br>
                                       </div>
                                       <div class="col-3" id="role">
                                            <label for="inputEmail4">Role</label>
                                            <input type="text" class="form-control" placeholder="Role/Post" id="row2" name="role[]" ><br>
                                       </div>
                                       <div class="col-3" id="role">
                                            <label for="inputEmail4">Add </label><br>
                                          <input type="button" id="btnAdd2" value="+" class="btn btn-primary" >
                                       </div>
                                       </div> 
                                        
                                       <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="education">
                                            <label for="inputEmail4">Education</label>
                                            <input type="text" class="form-control" placeholder="Salary per annum" id="row2" name="education[]" ><br>
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


    </body>
</html>
        </form>
    </body>
</html>

<?php }
else
header("location:signin.php");
include 'footer.php';
?>