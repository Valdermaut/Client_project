<?php

include 'database.php';
session_start();
include 'nav_no_login.php';
if(isset($_POST['submit'])){
  extract($_POST);
 print_r($_POST);
echo $password;
if($password==$cpassword){
$select_query = mysqli_query($conn,"SELECT email from company where email='$email' ");
$num_email = mysqli_num_rows($select_query);

if($num_email==0){
    $insert_query = mysqli_query($conn, "INSERT INTO company(cname,mobile,email,password,cprofile,work_domain,country,fb_url,linkedin_url) VALUES('$cname','$mobile','$email','$password','$cprofile','$work_domain','$country','$fb_url','$linkedin_url')");
    
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
    $("#skill").append(' <input type="text" class="form-control" placeholder="work domain" id="row2"><br>');
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
  To register as a employee<a href="register.php"> click here</a>
</div></center>
<section id="com_det" style="text-align:center;align-items:center;"> 
<center><div class="jumbotron mt-3">
                <div class="dboard_user ">
                                <div id="dboard_user_det"> 
                                <h1 id="dboard_name">Company Regestration</h1>
                                <br>
                                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
                                        <div class="row">
                                          <div class="col-3">
                                            <label for="inputEmail4">Company Name</label>
                                            <input type="text" class="form-control" placeholder="First name" name="cname">
                                          </div>
                                        
                                          </div>
                                         <br>
                                          <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Mobile No.</label>
                                                  <input type="text" class="form-control" placeholder="Mobile No." name="mobile">
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
                                                  <input type="password" class="form-control" placeholder="password" name="password">
                                        </div>
                                        <div class="col-4">
                                                <label for="inputEmail4">Confirm Password</label>
                                                <input type="password" class="form-control" placeholder="confirm password" name="cpassword">
                                      </div>
                                        </div> 
                                        <br>

                                        <div class="row">
                                                <div class="col-7">
                                                  <label for="inputEmail4">Company Profile</label>
                                                  <input type="text" class="form-control" placeholder="Profile url link" name="cprofile">
                                                </div>
                                                </div>
                                        <br>
                                        <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                            <label for="inputEmail4">Work Domain Available</label>
                                            <input type="text" class="form-control" placeholder="work domain" id="row2" name=work_domain><br>
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

<?php include 'footer.php';?>