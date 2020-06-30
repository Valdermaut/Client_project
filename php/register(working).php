<?php

include 'database.php';

if(isset($_POST['submit'])){
  extract($_POST);
 // print_r($_POST);
echo $password;
if($password==$cpassword){
$select_query = mysqli_query($conn,"SELECT email from user where email='$email' ");
$num_email = mysqli_num_rows($select_query);

if($num_email==0){
    $insert_query = mysqli_query($conn, "INSERT INTO user(fname,mname,lname,mobile,email,password,edu_detail,skill,country,fb_url,linkedin_url) VALUES('$fname','$mname','$lname','$mobile','$email','$password','$edu_detail','$skill','$country','$fb_url','$linkedin_url')");
    
    if($insert_query){
      echo "succeess";
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
    $("#skill").append(' <input type="text" class="form-control" placeholder="skill" id="row2"><br>');
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
                                            <input type="text" class="form-control" placeholder="First name" name="fname">
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
                                                  <input type="text" class="form-control" placeholder="Mobile No." name="mobile">
                                                </div>
                                                <div class="custom-file col-3">
                                                
                                                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                                      </div>
                                                </div>

                                        <br>
                                        <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Email address</label>
                                                  <input type="text" class="form-control" placeholder="email" name="email">
                                        </div>
                                        </div> 
                                        
                                        <br>
                                        <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Password</label>
                                                  <input type="text" class="form-control" placeholder="password" name="password">
                                        </div>
                                        <div class="col-4">
                                                <label for="inputEmail4">Confirm Password</label>
                                                <input type="text" class="form-control" placeholder="confirm password" name="cpassword">
                                      </div>
                                        </div> 
                                        <br>

                                        <div class="row">
                                                <div class="col-8">
                                                  <label for="inputEmail4">Educational Qualification</label>
                                                  <textarea class="form-control" placeholder="Description of educational detail" name="edu_detail"></textarea>
                                                </div>
                                                </div>
                                        <br>
                                        <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                            <label for="inputEmail4">Skills</label>
                                            <input type="text" class="form-control" placeholder="skill" id="row2" name="skill"><br>
                                       </div>
                                       <div class="col-3" id="skill">
                                            <label for="inputEmail4">Add </label><br>
                                          <input type="button" id="btnAdd" value="+" class="btn btn-primary">
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