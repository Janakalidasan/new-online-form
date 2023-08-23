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
        .staff{
            margin-top:-75px ;
        }
        a {
    color: #fff;
    text-decoration: none;
}

    </style>
</head>
    

<body>

    <!-- header -->
    <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Online Leave Application</a>
            
            <!-- <a id="register" href="signup.php">Sign Up</a> -->
        </div>
    </nav>
    <!-- header ends -->


   

    <!-- body -->
    <div class="container-fluid">
        <div class="row">
            <!-- container and row divs for responsive -->

            <!-- leftComponent -->
            <div class="leftComponent col-md-6 col-lg-6 col-sm-12 les">
                <div>
                    <h2 class="name">STAFF</h2>
</div>
<marquee behavior="scroll" direction="left">*Staff registration is now ready ,Please click on below staff login button and Register first, then login.</marquee>
                <img src="img/new-1.jpg" alt="Leave Image" class="img-fluid">
               <div class="stft">
                <a href="../Online/stafflog.php"><button type="button" class="btn btn-primary staff">Staff Login</button></a>
</div>
            </div>



            <div class="leftComponent col-md-6 col-lg-6 col-sm-12 less">
         
            <div>
                    <h2 class="name">STUDENT</h2>
</div>
<marquee behavior="scroll" direction="left">*Student registration is now ready ,Please click on below student login button and Register first then login.</marquee>
                <img src="img/students.png" alt="Leave Image" class="img-fluid">
                <div class="stft">
                <a href="../Online/student-login.php"><button type="button" class="btn btn-primary staff">Student Login</button></a>
</div>
            </div>
            
        </div>
    </div>
    

    <footer class="footer navbar navbar-expand-lg navbar-light bg-light" style="color:white;">
    <div>
      <p class="text-center">&copy; <?php echo date("Y"); ?> - Online Leave Application</p>
    
    </div>
    </footer>
</body>
</html>

<?php
ini_set('display_errors', true);
error_reporting(E_ALL);
?>