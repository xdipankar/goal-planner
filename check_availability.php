<?php 
require_once("inc/dbnew.php");
// Code for checking username availabilty
// if(!empty($_POST["username"])) {
// $uname= $_POST["username"];
// $sql ="SELECT UserName FROM  userdata WHERE UserName=:uname";
// $query= $dbh -> prepare($sql);
// $query-> bindParam(':uname', $uname, PDO::PARAM_STR);
// $query-> execute();
// $results = $query -> fetchAll(PDO::FETCH_OBJ);
// if($query -> rowCount() > 0)
// {
// echo "<span style='color:red'> Username already exists.</span>";
// } else{	
// echo "<span style='color:green'> Username available for Registration.</span>";
// }
// }

// Code for checking email availabilty
if(!empty($_POST["email"])) {
$email= $_POST["email"];
$sql ="SELECT email FROM  user WHERE email=:email";
$query= $pdo -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
echo '
		<i class="icon-close text-danger"></i>
		<span class="text-danger"> Email is Already Registered.</span>
	';
} else{	
echo '<i class="icon-check text-success"></i><span class="text-success"> Email is Available to Register.</span>';
}
}

?>