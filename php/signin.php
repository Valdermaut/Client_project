<?php 
include 'nav_no_login.php';
include 'database.php';
session_start();
if(isset($_POST['submit'])){
    extract($_POST);
    if($select=="user"){
        $select_query=mysqli_query($conn,"SELECT * from user where email='$email'");
        $num = mysqli_num_rows($select_query);
        if($num==0){
            echo "email doesn't exist";
        }
        if($num==1){
            $row= mysqli_fetch_assoc($select_query);
            if($row['password']==$password){
                echo "logined user";
				$_SESSION['email'] = $email;
				$_SESSION['select'] = $select;
                header("Location: dasboard.php");
            }
            else
            echo "check the password";
        }
    }

    else if($select=="company"){
        $select_query=mysqli_query($conn,"SELECT * from company where email='$email'");
        $num = mysqli_num_rows($select_query);
        if($num==0){
            echo "email doesn't exist";
        }
        if($num==1){
            $row= mysqli_fetch_assoc($select_query);
            if($row['password']==$password){
                echo "logined company";
				$_SESSION['email'] = $email;
				$_SESSION['select'] = $select;
                header("Location: cdasboard.php");
            }
            else
            echo "check the password";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V15</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						Sign In
					</span>
				</div>

				<form class="login100-form validate-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-check">
                <input class="form-check-input" type="radio" name="select" id="exampleRadios1" value="user" checked>
                <label class="form-check-label" for="exampleRadios1" >
                    User Login
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="select" id="exampleRadios2" value="company">
                <label class="form-check-label" for="exampleRadios2">
                    Company Login
                </label>
                </div>
                
                <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="email" placeholder="Enter username">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="password" placeholder="Enter password">
						<span class="focus-input100"></span>
                    </div>
                   <center> <div class="container-login100-form-btn">
                            <input type="submit" name="submit" type="button" class="login100-form-btn" style="background: #178BDD">
                        </div>

							<a href="#" class="txt1">
								Forgot Password?
							</a></center>
                        </div>
                        
					</div>

					
				</form>
			</div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>
			(function ($) {
				"use strict";
			
				/*==================================================================
				[ Focus Contact2 ]*/
				$('.input100').each(function(){
					$(this).on('blur', function(){
						if($(this).val().trim() != "") {
							$(this).addClass('has-val');
						}
						else {
							$(this).removeClass('has-val');
						}
					})    
				})
			
				/*==================================================================
				[ Validate ]*/
				var input = $('.validate-input .input100');
			
				$('.validate-form').on('submit',function(){
					var check = true;
			
					for(var i=0; i<input.length; i++) {
						if(validate(input[i]) == false){
							showValidate(input[i]);
							check=false;
						}
					}
			
					return check;
				});
			
			
				$('.validate-form .input100').each(function(){
					$(this).focus(function(){
					   hideValidate(this);
					});
				});
			
				function validate (input) {
					if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
						if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
							return false;
						}
					}
					else {
						if($(input).val().trim() == ''){
							return false;
						}
					}
				}
			
				function showValidate(input) {
					var thisAlert = $(input).parent();
			
					$(thisAlert).addClass('alert-validate');
				}
			
				function hideValidate(input) {
					var thisAlert = $(input).parent();
			
					$(thisAlert).removeClass('alert-validate');
				}
				
			
			})(jQuery);</script>

</body>
</html>

<?php include 'footer.php';?>