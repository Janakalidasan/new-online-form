<?php

require_once("DBConnection.php");
session_start();

if(!isset($_SESSION["sess_user"])){
	header("Location: index.php");
  }
else{

	$eid = $_GET['eid'];
	$descr = $_GET['absence'];

	$add_to_db = mysqli_query($conn,"UPDATE leavefor SET status='Accepted'");

				if($add_to_db){	
					echo 'Saved!!';
					header("Location: admin.php");
				}
				else{
					echo "Query Error : " . "UPDATE leavefor SET status='Accepted' ".mysqli_error($conn);
				}
	}

	ini_set('display_errors', true);
	error_reporting(E_ALL);  
         
?>