<?php
/*
Author: Dipankar Mohanta
Website: http://www.dipankarmohanta.com/
*/
 
require('../inc/db.php');
//include('inc/core.php');
include("../inc/auth.php"); //include auth.php file on all secure pages 

?>
<?php 
if($_POST['name']!="" && $_POST['category']!="" &&  $_POST['date']!=""){
	extract($_POST);
   $name = $con->real_escape_string ($_POST['name']);
        $category = $con->real_escape_string ($_POST ['category']);
        $date = $con->real_escape_string ($_POST ['date']);
        $userid = $dm_id;
        $id = ($_POST['id']!="") ? $_POST['id'] : '';
    if($id!="") {
            $query = " UPDATE `task` SET `name`= '$name', `category`='$category',`date`= '$date', `status`='$status', `userid`='$userid' WHERE id=$id";
            $msg = "$name is Updated Successfully";  
            }
        else{
                $query = " INSERT INTO `task` SET `name`= '$name', `category`='$category',`date`= '$date', `status`='PENDING', `userid`='$userid' ";
                $msg = "$name is Successfully Added Database";
            }

     $sql = $con->query($query);

}
?>