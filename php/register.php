<?php

include 'database.php';
session_start();
include 'nav_no_login.php';

$select_education_data = mysqli_query($conn,"SELECT * from education_data");
$select_skill_data = mysqli_query($conn,"SELECT * from skill_data");

if(isset($_POST['submit'])){
  extract($_POST);
  $skills = implode("-",$skill);
  $educations = implode("-",$education);

 // print_r($_POST);
echo $password;
if($password==$cpassword){
$select_query = mysqli_query($conn,"SELECT email from user where email='$email' ");
$num_email = mysqli_num_rows($select_query);


if($num_email==0){
    $insert_query = mysqli_query($conn, "INSERT INTO user(fname,mname,lname,mobile,email,password,edu_detail,skill,country,fb_url,linkedin_url) VALUES('$fname','$mname','$lname','$mobile','$email','$password','$educations','$skills','$country','$fb_url','$linkedin_url')");
    
    if($insert_query){
      echo "succeess";
      header("location:signin.php");
  }
  else{
    echo "failed";
  }

  }
  
  else
  echo "email already exist";


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
    $("#skill").append(' <input type="text" class="form-control" placeholder="Any Other                                                                                                                                                                                                                                                                                                                                                                    
    " id="row2"><br>');
  });
  $("#btn2").click(function(){
    $("ol").append("<li>Appended item</li>");
  });
});

$(document).ready(function(){
  $("#btnAdd1").click(function(){
    $("#education").append(' <input type="text" class="form-control" placeholder="Any other" id="row2"><br>');
  });
  $("#btn2").click(function(){
    $("ol").append("<li>Appended item</li>");
  });
});

function getData(e) {
    e.preventDefault();
}
</script>
</head>
<body>

<!--COMPANY DETAIL-->
<center><div class="alert alert-primary col-10" role="alert" >
  To register as a company<a href="cregister.php"> click here</a>
</div></center>

<section id="com_det" style="text-align:center;align-items:center;"> 
<center><div class="jumbotron mt-3">
                <div class="dboard_user ">
                                <div id="dboard_user_det"> 
                                <h1 id="dboard_name">User Regestration</h1>
                                <br>
                                <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                        <div class="row">
                                          <div class="col-3">
                                            <label for="inputEmail4">First name</label>
                                            <input type="text" class="form-control" placeholder="First name" name="fname" required>
                                          </div>
                                          <div class="col-3">
                                                <label for="inputEmail4">Middle name</label>  
                                            <input type="text" class="form-control" placeholder="Middle name" name="mname">
                                              </div>
                                            
                                          <div class="col-3">
                                                <label for="inputEmail4">Last name</label>
                                            <input type="text" class="form-control" placeholder="Last name" name="lname">
                                          </div>
                                          </div>
                                         <br>
                                          <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Mobile No.</label>
                                                  <input type="text" class="form-control" placeholder="Mobile No." name="mobile" required>
                                                </div>
                                                
                                                </div>

                                        <br>
                                        <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Email address</label>
                                                  <input type="text" class="form-control" placeholder="email" name="email" required>
                                        </div>
                                        </div> 
                                        
                                        <br>
                                        <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Password</label>
                                                  <input type="password" class="form-control" placeholder="password" name="password" required>
                                        </div>
                                        <div class="col-4">
                                                <label for="inputEmail4">Confirm Password</label>
                                                <input type="password" class="form-control" placeholder="confirm password" name="cpassword" required>
                                      </div>
                                        </div> 
                                        <br>

                                        <div class="row">
                                                <div class="col-8">
                                                  <label for="inputEmail4">Educational Qualification</label><br>
                                                  <div class="dropdown">
  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Select  </a>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <?php $i=1; while($row_education = mysqli_fetch_assoc($select_education_data)){
                                                    ?>
                                                <input type="checkbox" name = "education[]" value = "<?php echo $row_education['education']; ?>" ><?php echo $row_education['education']; ?><br>
                                                <?php
                                                 }?><br>
  </div>
</div>
                                              
                                                 <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="education">
                                            <label for="inputEmail4"></label>
                                            <input type="text" class="form-control" placeholder="Any Other" id="row2" name="education[]"><br>
                                       </div>
                                       <div class="col-3" id="education">
                                            <label for="inputEmail4"> </label><br>
                                          <input type="button" id="btnAdd1" value="+" class="btn btn-primary">
                                       </div>
                                       </div> 
                                                </div>
                                                </div>
                                        
                                                <div class="row">
                                                <div class="col-8">
                                                  <label for="inputEmail4">Skill</label><br>
                                                  <div class="dropdown">
                                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Select
                                                </a>

                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <?php $i=1; while($row_skill = mysqli_fetch_assoc($select_skill_data)){
                                                    ?>
                                                <input type="checkbox" name="skill[]" value = "<?php echo $row_skill['skill']; ?>" ><?php echo $row_skill['skill']; ?><br>
                                                <?php
                                                 }?><br>
                                                </div>
                                              </div>
                                               
                                                 <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                            <label for="inputEmail4"></label>
                                            <input type="text" class="form-control" placeholder="Any Other" id="row2" name="skill[]"><br>
                                       </div>
                                       <div class="col-3" id="skill">
                                            <label for="inputEmail4"> </label><br>
                                          <input type="button" id="btnAdd" value="+" class="btn btn-primary">
                                       </div>
                                       </div> 
                                                </div>
                                                </div>         
                                    
                                        <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                            <label for="inputEmail4">Country</label>
                                            <input type="text" class="form-control" placeholder="country" id="row2" name="country"><br>
                                       </div>
                                       </div> 

                                        <div class="row" id="blacklistgrid">
                                          <div class="col-5" id="skill">
                                            <label for="inputEmail4">Facebook Profile</label>
                                            <input type="text" class="form-control" placeholder="facebook url" id="row2" name="fb_url"><br>
                                       </div>
                                       <div class="col-5" id="skill">
                                            <label for="inputEmail4">LinkedIn Profile</label>
                                         <input type="text" class="form-control" placeholder="linkedin url" id="row2" name="linkedin_url"><br>
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

<?php include 'footer.php';?>