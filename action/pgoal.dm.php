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
if($_POST['pname']!="" && $_POST['pinfo']!="" && $_POST['progress']!="" && $_POST['edate']!=""){
	extract($_POST);
        $pname = $con->real_escape_string ($_POST['pname']);
        $pinfo = $con->real_escape_string ($_POST ['pinfo']);
        $edate = $con->real_escape_string ($_POST ['edate']);
        $pstatus = $con->real_escape_string ($_POST['pstatus']);
        $progress = $con->real_escape_string ($_POST['progress']);
        $userid = $dm_id;
        $id = ($_POST['id']!="") ? $_POST['id'] : '';
    if($id!="") {
            $query = " UPDATE `pgoal` SET `pname`= '$pname', `pinfo`='$pinfo',`edate`= '$edate', `pstatus`='$pstatus', `progress`='$progress', `userid`='$userid' WHERE id=$id";
            $msg = "$pname is Updated Successfully";  
            }
        else{
                $query = " INSERT INTO `pgoal` SET `pname`= '$pname', `pinfo`='$pinfo',`edate`= '$edate',`progress`='$progress', `pstatus`='PENDING', `userid`='$userid' ";
                $msg = "$pname is Successfully Added Database";
            }

     $sql = $con->query($query);

}
?>