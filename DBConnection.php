<?php
  $conn = mysqli_connect('localhost','root','','leaveform');
  // live
  //  $conn = mysqli_connect('sql307.infinityfree.com','if0_34870563','E8lXs09mlNtpKt','if0_34870563_leaveform');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
  }
?>