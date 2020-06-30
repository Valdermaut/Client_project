<?php 
include 'database.php';
session_start();
if(isset($_POST['search'])){
  extract($_POST);
  $_SESSION['job_title']=$job_title;
  $_SESSION['city']=$city;
  header("location:search_res.php");
  //$sql_search = mysqli_query($conn,"SELECT * from job where job_title like '%$job_title%' AND city like '%$city%' ");
}

?>

<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s01"> 
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <fieldset>
          <legend>Welcome to $company_name</legend>
        </fieldset>
        <div class="inner-form">
          <div class="input-field first-wrap">
            <input id="search" type="text" placeholder="What job are you looking for?" name="job_title" />
          </div>
          <div class="input-field third-wrap">
            <input type="submit" class="btn-search" type="button" style="background:#178BDD" name="search" value="Search">
          </div>
        </div>
      </form>
    </div>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
