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
if($_POST['gname']!="" && $_POST['gamount']!="" && $_POST['ginfo']!="" && $_POST['edate']!=""){
	extract($_POST);
   $gname = $con->real_escape_string ($_POST['gname']);
        $gamount = $con->real_escape_string ($_POST ['gamount']);
        $ginfo = $con->real_escape_string ($_POST ['ginfo']);
        $edate = $con->real_escape_string ($_POST ['edate']);
        $status = $con->real_escape_string ($_POST['status']);
        $userid = $dm_id;
        $id = ($_POST['id']!="") ? $_POST['id'] : '';
    if($id!="") {
            $query = " UPDATE `goal` SET `gname`= '$gname', `gamount`='$gamount', `ginfo`='$ginfo',`edate`= '$edate', `status`='$status', `userid`='$userid' WHERE id=$id";
            $msg = "$gname is Updated Successfully";  
            }
        else{
                $query = " INSERT INTO `goal` SET `gname`= '$gname', `gamount`='$gamount', `ginfo`='$ginfo',`edate`= '$edate', `status`='PENDING', `userid`='$userid' ";
                $msg = "$gname is Successfully Added Database";
            }

     $sql = $con->query($query);

}
?>