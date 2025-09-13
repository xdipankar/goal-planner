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
if($_POST['goal']!="" && $_POST['date']!="" && $_POST['account']!="" && $_POST['amount']!=""){
	extract($_POST);
   $goal = $con->real_escape_string ($_POST['goal']);
        $date = $con->real_escape_string ($_POST ['date']);
        $account = $con->real_escape_string ($_POST ['account']);
        $amount = $con->real_escape_string ($_POST ['amount']);
        $remarks = $con->real_escape_string ($_POST ['remarks']);
        $userid = $dm_id;
        $id = ($_POST['id']!="") ? $_POST['id'] : '';
    if($id!="") {
            $query = " UPDATE `deposit` SET `goal`= '$goal', `date`='$date', `account`='$account',`amount`= '$amount', `user`='$userid', `remarks`='$remarks' WHERE id=$id";
            $msg = "Updated Successfully";  
            }
        else{
                $query = " INSERT INTO `deposit` SET `goal`= '$goal', `date`='$date', `account`='$account',`amount`= '$amount', `user`='$userid', `remarks`='$remarks'  ";
                $msg = "Successfully Added";
            }

     $sql = $con->query($query);

}
?>