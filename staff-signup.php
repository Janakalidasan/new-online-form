<?php 
require_once("DBConnection.php");
include("function1.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Sign Up</title>
  <style>
    h1 {
      text-align: center;
      font-size: 2.5em;
      font-weight: bold;
      padding-top: 1.2em;
    }

    form {
      padding: 40px;
    }

    input,
    textarea {
      margin: 5px;
      font-size: 1.1em !important;
      outline: none;
    }

    input[type=radio],
    select {
      width: max-content;
      padding: 5px;
      margin-top: 0px;
      margin-bottom: 20px;
      margin-left: 15px;
      margin-right: 5px;
    }

    textarea {
      height: 80px;
    }

    #err {
      display: none;
      padding: 1.5em;
      padding-left: 4em;
      font-size: 1.2em;
      font-weight: bold;
      margin-top: 1em;
    }

    .error {
      color: #FF0000;
    }
    .form-control:focus {
      border-color:blue !important;
    }
    .img-fluid-1{
     height: 638px;
    }
    .sls {
    background-color: blue;
    color: #fff;
    font-weight: 900;
    border: 2px solid blue;
    border-radius: 20px;
}
    .sls:hover{
      background-color:#fff;
      color:blue;
      font-weight:900;
      border:2px solid blue;
    }
    .form-floating>label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    padding: .5rem .75rem !important;
    pointer-events: none;
    border: 1px solid transparent;
    transform-origin: 0 0;
    transition: opacity .1s ease-in-out,transform .1s ease-in-out;
}
.form-floating>.form-control, .form-floating>.form-select {
    height: calc(2.5rem + 2px);
    padding: 1rem .75rem;
}

  </style>

</head>

<body>
<!-- php code -->
  <?php
  $nameErr = $emailErr = $phoneErr = $passwordErr = $repasswordErr = $genderErr = "";
  $fullname = $username = $email = $phone = $password = $repassword = $gender = "";
  global $validate;

  if(isset($_POST['submit'])){

    if(empty($_POST['fulname'])){
      $fullnameErr = "Please Enter Fullname";
      $validate = false;
    }
    else{
      $fullname = mysqli_real_escape_string($conn,$_POST['fulname']);
      $validate = true;
    }

    if(empty($_POST['usename'])){
      $nameErr = "Please Enter Username";
      $validate = false;
    }
    else{
      $username = mysqli_real_escape_string($conn,$_POST['usename']);
      $validate = true;
    }

    if(empty($_POST['mail'])){
      $emailErr = "Please Enter Email";
      $validate = false;
    }
    else{
      $email = mysqli_real_escape_string($conn,$_POST['mail']);
      $validate = true;
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailErr = "Please Enter valid email";
        $validate = false;
      }
    }

    if(empty($_POST['phoneno'])){
      $phoneErr = "Please Enter Phone Number";
      $validate = false;
    }
    else{
      $phone = mysqli_real_escape_string($conn,$_POST['phoneno']);
      $validate = true;
      if(strlen($phone) > 10 || strlen($phone) < 10 || !preg_match("/[0-9]/",$phone)){
        $phoneErr = "Please Enter valid Phone Number";
        $validate = false;
      }
    }

    if(empty($_POST['pasword'])){
      $passwordErr = "Please Enter Password";
      $validate = false;
    }
    else{
      $password = mysqli_real_escape_string($conn,$_POST['pasword']);
      $validate = true;
    }

    if(empty($_POST['repasword'])){
      $repasswordErr = "Please Enter re-password";
      $validate = false;
    }
    else{
      $repassword = mysqli_real_escape_string($conn,$_POST['repasword']);
      $validate = true;
      if($password !== $repassword){
        $repasswordErr = "Password and Confirm Password don't match";
        $validate = false;
      }
    }

    if(empty($_POST['Gender'])){
      $genderErr = "Please Select Gender";
      $validate = false;
    }
    else{
      $gender = mysqli_real_escape_string($conn,$_POST['Gender']);
      $validate = true;
    }


    $dept = $_POST['Departments'];
   
  
 
    if($validate){
      staffsign($fullname,$username,$email,$password,$phone,$repassword,$gender,$dept,$conn);
    }
  }

ini_set('display_errors', true);
error_reporting(E_ALL);
  ?>


  <!-- navbar -->
  <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Staff Regitration</a>
      <a id="registers" href="stafflog.php">Login</a>
      <a id="register" href="index.php">Home</a>
    </div>
  </nav>
<div class="row lsl">
<div class="col-lg-6 col-md-6 col-sm-12 small">
<h1>Registration Form</h1>

  <div class="container">
    <div class="alert alert-danger" id="err" role="alert">
    </div>
  
    <!--form-->
    <form method="POST" autocomplete="off">
  
      <!--Name-->
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="fulname" id="fullname" value="<?php echo $fullname; ?>"placeholder="Fullname">
        <label for="Fullname">Fullname</label>
        <span class="error"><?php echo $nameErr; ?></span>
      </div>
  
      <!--username-->
      <div class="form-floating mb-3">
        <input type="text" class="form-control" name="usename" id="username" value="<?php echo $username; ?>"placeholder="Username">
        <label for="username">Username</label>
        <span class="error"><?php echo $nameErr; ?></span>
      </div>
  
      <!--Email id-->
      <div class="form-floating mb-3">
        <input class="form-control" type="text" name="mail" id="email" value="<?php echo $email; ?>" placeholder="Enter your email">
        <label for="email">Email address</label>
        <span class="error"><?php echo $emailErr; ?></span>
      </div>
  
      <!--Phone No.-->
      <div class="form-floating mb-3">
        <input class="form-control" type="tel" name="phoneno" id="phone" value="<?php echo $phone; ?>" placeholder="Enter your Phone no.">
        <label for="phone">Phone No.</label>
        <span class="error"><?php echo $phoneErr; ?></span>
      </div>
  
      <!--Password.-->
      <div class="form-floating mb-3">
        <input class="form-control" type="password" name="pasword" id="password" value="<?php echo $password; ?>" placeholder="Enter your password">
        <label for="password">Password</label>
        <span class="error"><?php echo $passwordErr; ?></span>
      </div>
  
      <!--Confirm Password.-->
      <div class="form-floating mb-3">
        <input class="form-control" type="password" name="repasword" id="confirmPassword" value="<?php echo $repassword ?>" placeholder="Re-Enter password">
        <label for="confirmPassword">Confirm Password</label>
        <span class="error"><?php echo $repasswordErr; ?></span>
      </div>
  
      <label for="gender">Gender:</label>
      <input type="radio" id="gender" name="Gender" <?php if(isset($gender)&&$gender=="Male") echo "checked" ?> value="Male">Male
      <input type="radio" id="gender" name="Gender" <?php if(isset($gender)&&$gender=="Female") echo "checked" ?> value="Female">Female
      <input type="radio" id="gender" name="Gender" <?php if(isset($gender)&&$gender=="Prefer Not to say") echo "checked" ?> value="Prefer Not to say">Prefer Not to say
      <span class="error"><?php echo $genderErr; ?></span>
      <br>
  
      <div class="row">
  
      
  
      <div class="col-6">
      <label>Depart:</label>
      <select name="Departments" style="">
        <option>Mechanical</option>
        <option>IT</option>
        <option>Civil</option>
        <option>ECE</option>
        <option>EEE</option>
        <option>Al</option>
      
      </select>
      </div>
  
      </div>
  
      
  
      <br>
  
      <input type="submit" name="submit" value="Submit" class="btn sls">
    </form>
  </div>
</div>
<div class="col-lg-6 d-flex align-item-center">

<img src="img/hand.jpg" alt="Leave Image" class="img-fluid-1 img-fluid">
</div>
</div>

  



  <!--Footer-->
  <footer class="footer navbar navbar-expand-lg navbar-light bg-light" style="color:white;">
  <div>
    <p class="text-center">&copy; <?php echo date("Y"); ?> - Online Leave Application</p>
      <!-- <p class="text-center">Developed By Yash Sojitra and Darshan Mamtani</p> -->
    </div>
  </footer>


</body>

</html>