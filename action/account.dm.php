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
if($_POST['name']!="" && $_POST['accno']!="" && $_POST['bal']!="" && $_POST['udate']!="" && $_POST['type']!="" && $_POST['detail']!=""):
	extract($_POST);
    $name = $con->real_escape_string ($_POST['name']);
    $accno = $con->real_escape_string ($_POST ['accno']);
    $bal = $con->real_escape_string ($_POST ['bal']);
    $udate = $con->real_escape_string ($_POST ['udate']);
    $userid = $dm_id;
    $type = $con->real_escape_string ($_POST ['type']);
    $detail = $con->real_escape_string ($_POST ['detail']);
    if($id!="") :
            $query = " UPDATE `uia` SET `name`= '$name', `accno`='$accno', `userid`='$userid',`bal`='$bal',`udate`='$udate', `type`='$type', `detail`='$detail' WHERE id=$id";
            $msg = "$name is Updated Successfully.";  
        else: 
  	$query = " INSERT INTO `uia` SET `name`= '$name', `accno`='$accno', `userid`='$userid',`bal`='$bal',`udate`='$udate', `type`='$type', `detail`='$detail' ";
endif;
     $sql = $con->query($query);

endif;
?>