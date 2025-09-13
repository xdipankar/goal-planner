<?php
/*
Author: Dipankar Mohanta
Website: http://www.dipankarmohanta.com/
*/
$con = mysqli_connect("localhost","root","","goalplanner");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>