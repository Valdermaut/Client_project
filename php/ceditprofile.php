<?php

include 'database.php';
session_start();
if($_SESSION['select']=="company"){
include 'nav_com_home.php';
if(isset($_POST['submit'])){
  extract($_POST);
  $select_query = mysqli_query($conn,"SELECT * from company where email='$email' ");
  $row_com = mysqli_fetch_assoc($select_query);

    if($curpassword==$row_com['password']){  
  

 print_r($_POST);
echo $password;
if($password==$cpassword){

    $insert_query = mysqli_query($conn, "UPDATE company SET cname='$cname',mobile='$mobile',password='$password',cprofile='$cprofile',work_domain='$work_domain',country='$country',fb_url='$fb_url',linkedin_url='$linkedin_url' where email='$email'" );
    
    if($insert_query){
      echo "succeess";
  }
  else{
    echo "failed";
  }

}
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
                                            <input type="text" class="form-control" placeholder="First name" name="cname" value="<?php echo $row_user['cname'];?>">
                                          </div>
                                        
                                          <div class="custom-file col-3">
                                                
                                                <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                              </div>
                                          </div>
                                         <br>
                                          <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Mobile No.</label>
                                                  <input type="text" class="form-control" placeholder="Mobile No." name="mobile" value="<?php echo $row_user['mobile'];?>">
                                                </div>
                                                </div>

                                        <br>
                                        <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Email address</label>
                                                  <input type="text" class="form-control" placeholder="email" name="email" value="<?php echo $_GET['email'];?>" readonly >
                                        </div>
                                        </div> 
                                        
                                        <br>
                                        
                                        <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">Current Password</label>
                                                  <input type="text" class="form-control" placeholder="email" name="curpassword">
                                        </div>
                                        </div> 
                                        <br>
                                        <div class="row">
                                                <div class="col-3">
                                                  <label for="inputEmail4">New Password</label>
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
                                                  <textarea class="form-control" placeholder="Profile url link" name="cprofile" ><?php echo $row_user['cprofile'];?></textarea>
                                                </div>
                                                </div>
                                        <br>
                                        <div class="row" id="blacklistgrid">
                                          <div class="col-3" id="skill">
                                            <label for="inputEmail4">Work Domain Available</label>
                                            <input type="text" class="form-control" placeholder="work domain" id="row2" name=work_domain value="<?php echo $row_user['cname'];?>"><br>
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
<?} 
else 
header("location:signin.php");
include 'footer.php';
?>