<?php
  $conn = mysqli_connect('localhost','root','','leaveform');
    // $conn = mysqli_connect('sql112.unaux.com','unaux_34856053','kemhaa6z','unaux_34856053_leaveform');
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error."<br>");
  }
?>