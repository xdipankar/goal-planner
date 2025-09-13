<?php require('db.php') ?>
<?php
/*
Author: Dipankar Mohanta
Website: http://www.dipankarmohanta.com/
*/
?>
<?php
session_start();
if
	(!isset($_SESSION["gpuseremail"]))
{
header("Location: login.php");
exit();
 }else{
 	$dm_email = $_SESSION["gpuseremail"];
 	$sql="SELECT * FROM user where email='$dm_email'";
        $result=mysqli_query($con,$sql);

        while($rows=mysqli_fetch_array($result)){
        		$dm_id = $rows['id'];
                $dm_name = $rows['name'];
                $dm_mob = $rows['mobile'];
                $dm_dob = $rows['dob'];
            }
 }
?>

