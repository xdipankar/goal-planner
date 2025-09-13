<?php
//Database Configuration File
include('inc/dbnew.php');
error_reporting(1);
if(isset($_POST['signup']))
{
//Getting Post Values
$fullname=$_POST['name'];  
$email=$_POST['email']; 
$password=$_POST['password'];
$status='ACTIVE';
// $hasedpassword=hash('sha256',$password);
// Query for validation of username and email-id
$ret="SELECT * FROM user where email=:uemail";
$queryt = $pdo -> prepare($ret);
$queryt->bindParam(':uemail',$email,PDO::PARAM_STR);
$queryt -> execute();
$results = $queryt -> fetchAll(PDO::FETCH_OBJ);
if($queryt -> rowCount() == 0)
{
// Query for Insertion
$sql="INSERT INTO user(name,email,dmail,type,ustatus) VALUES(:name,:uemail,:upassword,2,:ustatus)";
$query = $pdo->prepare($sql);
// Binding Post Values
$query->bindParam(':name',$fullname,PDO::PARAM_STR);
$query->bindParam(':uemail',$email,PDO::PARAM_STR);
$query->bindParam(':upassword',$password,PDO::PARAM_STR);
$query->bindParam(':ustatus',$status,PDO::PARAM_STR);
// $query->bindParam(':upassword',$hasedpassword,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $pdo->lastInsertId();
if($lastInsertId)
{
$msg='You have signup  Scuccessfully.
  Go to Login Page.
  ';

}
else 
{
$error="Something went wrong.Please try again";
}
}
 else
{
$error="Email-id already exist. Please try to Login.";
}
}
?>
<!DOCTYPE html>

<html class="loading" lang="en">
  <!-- BEGIN : Head-->
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="Er. Dipankar Mohanta">
    <title>Registration Page - Goal Planner, Free Personal and Finencial Goal Tracking Planner.</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/gp2.png">
    <link rel="shortcut icon" type="image/png" href="img/gp2.png">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-touch-fullscreen" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="default">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <!-- font icons-->
    <link rel="stylesheet" type="text/css" href="fonts/feather/style.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/prism.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/switchery.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="css/components.min.css">
    <link rel="stylesheet" type="text/css" href="css/themes/layout-dark.min.css">
    <link rel="stylesheet" href="css/plugins/switchery.min.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" href="css/pages/authentication.css">
    <link rel="stylesheet" href="css/plugins/form-validation.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
      <style>
        .errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
        </style>
    <!-- END: Custom CSS-->
    <!--Javascript for check username availability-->
<!-- <script>
function checkUsernameAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'username='+$("#username").val(),
type: "POST",
success:function(data){
$("#username-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){
}
});
}
</script> -->

<!--Javascript for check email availability-->
<script>
function checkEmailAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){

$("#email-availability-status").html(data);
 // $("#email").addClass(data);
$("#loaderIcon").hide();
},
error:function (){
 event.preventDefault();
}
});
}
</script>
<script>
function resetForm() {
    document.getElementById("signup").reset();
}
</script>
  </head>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body class="vertical-layout vertical-menu 1-column auth-page navbar-sticky blank-page" data-menu="vertical-menu" data-col="1-column">
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="wrapper">
      <div class="main-panel">
        <!-- BEGIN : Main Content-->
        <div class="main-content">
          <div class="content-overlay"></div>
          <div class="content-wrapper">


            <!--Registration Page Starts-->
<section id="multiple-validation" class="auth-height">
  <div class="row full-height-vh m-0">
    <div class="col-12 d-flex align-items-center justify-content-center">
      <div class="card overflow-hidden">
        <!-- <div class="card-content" id="input-validation"> -->
          <div class="card-content">
          <div class="card-body auth-img">
            <div class="row m-0">
              <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center text-center auth-img-bg py-2">
                <img src="img/gallery/register.png" alt="" class="img-fluid" width="350" height="230">
              </div>
              <div class="col-lg-6 col-md-12 px-4 py-3">
                <div align="center" class="">
                  <img src="img/gp2.png">
                </div>
                <form name="signup" id="signup" action=''method="post">
                <h4 class="card-title mb-2">Create Account</h4>
                <p>Fill the below form to create a new account.</p>

                <!--Error Message-->
                <?php if($error){ ?><div class="errorWrap">
                  <strong>Error </strong> : <?php echo htmlentities($error);?></div>
                <?php } ?>
                <!--Success Message-->
                <?php if($msg){ ?><div class="succWrap">
                  <strong>Well Done </strong> : <?php echo htmlentities($msg);?></div>
                <?php } ?> 

                  <div class="form-group">
                    <div class="controls">
                      <div class="position-relative has-icon-left">
                        <input type="text" name="name" pattern="[a-zA-Z\s]+" class="form-control mb-2" placeholder="Name" required data-validation-required-message="This name field is required" autocomplete="off">
                        <div class="form-control-position">
                          <i class="icon-user"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="controls">
                      <div class="position-relative has-icon-left">
                       <input type="email" name="email" id="email" onBlur="checkEmailAvailability()" class="form-control mb-2" placeholder="Your Email" required data-validation-required-message="The email field is required" autocomplete="off">
                      <span id="email-availability-status"></span> 
                        <div class="form-control-position">
                          <i class="icon-envelope"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                <div class="form-group">
                    <div class="controls">
                      <div class="position-relative has-icon-left">
                       <input type="password" name="password" class="form-control" placeholder="Your Password" required data-validation-required-message="The password field is required" minlength="6" autocomplete="off">
                     
                        <div class="form-control-position">
                          <i class="icon-lock"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="controls">
                      <div class="position-relative has-icon-left">
                       <input type="password" name="con-password" class="form-control" placeholder="Confirm Password" required data-validation-match-match="password" data-validation-required-message="The Confirm password field is required" minlength="6" autocomplete="off">
                      
                        <div class="form-control-position">
                          <i class="icon-ghost"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                <!-- <input type="password" id="password" name="password" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Must have at least 4 characters' : ''); if(this.checkValidity()) form.password_two.pattern = this.value;"  required class="form-control mb-2" placeholder="Password"> -->


                <!-- <input type="password" id="password_confirm" name="password_confirm" pattern="^\S{4,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Please enter the same Password as above' : '')" class="form-control mb-2" placeholder="Confirm Password"> -->


                <div class="checkbox auth-checkbox font-small-2 mb-3">
                  <input type="checkbox" checked disabled id="auth-ligin" readonly="">
                  <label for="auth-ligin"><span>I accept the terms & conditions</span></label>
                </div>
                <div class="d-flex justify-content-between flex-sm-row flex-column">
                  <a href="login" class="btn bg-light-primary mb-2 mb-sm-0"><i class="ft-arrow-left"></i>Login</a>
                  <button class="btn bg-light-warning" type="button" onclick="resetForm();">Reset</button>
                  <button class="btn btn-success" type="submit" name="signup">Register</i> </button>
                </div>
              </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Registration Page Ends-->

          </div>
        </div>
        <!-- END : End Main Content-->
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->
    <script src="vendors/js/vendors.min.js"></script>
    <script src="vendors/js/switchery.min.js"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="vendors/js/jqBootstrapValidation.js"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="js/core/app-menu.min.js"></script>
    <script src="js/core/app.min.js"></script>
    <script src="js/notification-sidebar.min.js"></script>
    <script src="js/customizer.min.js"></script>
    <script src="js/scroll-top.min.js"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="js/form-validation.js"></script>
    <script src="js/form-inputs.min.js"></script>
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="js/scripts.js"></script>
    <!-- END: Custom CSS-->

  </body>
  <!-- END : Body-->

</html>