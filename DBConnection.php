<?php
  $conn = mysqli_connect('localhost','root','','leaveform');
  
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
  }
?>