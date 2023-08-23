<?php 
require_once("DBConnection.php"); 
include("functions.php");
session_start();
?>

<?php

 	if (isset($_POST['login'])) {
	 	if (!empty($_POST['username']) && !empty($_POST['password'])) {
	 		$username = mysqli_real_escape_string($conn,$_POST['username']);
	 		$pass = mysqli_real_escape_string($conn,$_POST['password']);

            $login = login($username,$pass,$conn);          
	 	}
	 	else{
		 	echo "Required All fields!";
		} 	
 	}

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
    <link rel="stylesheet" href="css/style.css">
    <title>Online Leave Application</title>
    <style>
        #invalidMsg{
            display:none;
        }
        .cls{
            background-color:blue !important;
            color:#fff;
            border:2px solid blue !important;
        }
        .cls:hover{
            background-color:#fff !important;
            border:2px solid blue !important;
            color:#000;
        }
        .log{
            font-weight:900;
        }
    </style>
</head>
    

<body>

    <!-- header -->
    <!-- <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Student Login</a>
            <a id="registers" href="stafflog.php">Staff login</a>
            <a id="register" href="signup.php">Sign Up</a>
        </div>
    </nav> -->
    <!-- header ends -->


   

    <!-- body -->
    <div class="container-fluid">

        <div class="row">
            <!-- container and row divs for responsive -->

            <!-- leftComponent -->
            <div class="leftComponent col-md-5">
                <img src="img/students.png" alt="Leave Image" class="img-fluid">
            </div>
            <!-- leftComponent ends -->


            <!-- rightComponent -->
            <div class="rightComponent col-md-5">

                <h3> <b class="log">Welcome Back Student</b> </h3>
                <hr>
                <form method="POST" class="loginForm">
                <div class="alert alert-danger" id="invalidMsg">
                    <?php      
                        if(isset($_POST['login'])){
                            if($login == false)
                                echo "<script type='text/javascript'>document.getElementById('invalidMsg').style.display = 'block';</script>";
                                echo "Invalid Username or Password";
                        }
                        else
                            echo "";
                    ?>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="text" id="username" name="username" placeholder="Enter Username" required>
                    </div>
                    <div class="mb-3">
                        <input class="form-control" type="password" id="password" name="password" placeholder="Enter Password"
                            required>
                    </div>
                    <input type="submit" class="btn  cls" name="login" value="Log In">
                


                    <div class="row">
                         <div class="col-6">
                         <h6 style="font-weight:bold" class="dont"><a href="signup.php">Don't have a account?</a></h6>
                    </div>
                    <div class="col-6 ens">
                   <h6 style="font-weight:bold" class="dont"><a href="stafflog.php">Are you staff?</a></h6>
                    </div>
                    </div>
<!--                    
                     <div class="row">
                         <div class="col-6">
                         <h6 style="font-weight:bold">Don't have a account?</h6>
                    </div>
                    <div class="col-6 ens">
                    <a href="signup.php">Signup</a>
                    </div>
                    </div> -->

<!-- <h6 class="or">or</h6> -->
                    <!-- <div class="row">
                         <div class="col-6">
                         <h6 style="font-weight:bold">Are you staff?</h6>
                    </div>
                    <div class="col-6 ens">
                    <a href="stafflog.php">Click here</a>
                    </div>
                    </div> -->
                </form>
        
            </div>
            <!-- rightComponent ends -->
        </div>
    </div>
    <!-- body ends -->


    <!-- <div class="content2">
        <p class="heading lead text-start">
            Simple yet effective software for leave management system
        </p>
        <p class="text-start">
            Every organization may have different needs, so while picking on a leave management software, it will be
            smart to choose a leave solution that provides the basic requirements while offering the flexibility to
            customize the leave process. With greytHR managing employee leave is effortless with an all-rounded HR
            management software.
        </p>
    </div> -->

   
</body>
</html>

<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
?>