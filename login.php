<?php
    require('inc/db.php');
   session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['login'])){
        
        $email = stripslashes($_REQUEST['email']); // removes backslashes
        $email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con,$password);

        // $role = stripslashes($_REQUEST['role']);
        // $role = mysqli_real_escape_string($con,$role);

        
    //Checking is user existing in the database or not
        // $query = "SELECT * FROM `user` WHERE email='$email' and dmail='$password' and type=2 and ustatus ='ACTIVE' ";
        $query = "SELECT * FROM `user` WHERE email='$email' and dmail='$password' and type=2 and ustatus ='ACTIVE' ";

        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['gpuseremail'] = $email;
            $_SESSION['gpuserpassword'] = $password;

            echo '<meta http-equiv="refresh" content="0;url=index.php"/>';
           // header("Location: index.php"); // Redirect user to index.php
            }else{
                echo '<script type="text/javascript">
                    Swal.fire({title:"Login Error",text:"Please Provide Correct Login Detail ",type:"error",showConfirmButton:false})                    
                    </script>
                    <meta http-equiv="refresh" content="0;url=login.php"/>';
                }
    }else{
?>

<!DOCTYPE html>

<html class="loading" lang="en">
  <!-- BEGIN : Head-->
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="author" content="Er. Dipankar Mohanta">
    <title>Login Page - Goal Planner, Free Personal and Finencial Goal Tracking Planner.</title>
    <meta name="theme-color" content="#FF6D34" />
    <link rel="manifest" href="manifest.json">
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
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- END: Custom CSS-->
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
          <div class="content-wrapper"><!--Login Page Starts-->

<section id="login" class="auth-height">

  <div class="row full-height-vh m-0">
    <div class="col-12 d-flex align-items-center justify-content-center">

      <div class="card overflow-hidden">

        <div class="card-content">
          
          <div class="card-body auth-img">
            <div class="row m-0">
              <div class="col-lg-6 d-none d-lg-flex justify-content-center align-items-center auth-img-bg p-3">
                <img src="img/gallery/login.png" alt="" class="img-fluid" width="300" height="230">
              </div>
              <div class="col-lg-6 col-12 px-4 py-3">
                <div align="center" class="">
                  <img src="img/gp2.png">
                </div>
                <h4 class="mb-2 card-title">Login</h4>
                <p>Please login to your account.</p>
                <?php  
                if(isset($message))  
                {  
                     echo '<p class="text-danger">'.$message.'</p>';  
                }  
                ?>
                <form name="login" method="post">
                  <input type="text" name="email" id="email" class="form-control mb-3" placeholder="Your Email Address" autocomplete="off">
                <input type="password" name="password" id="password" class="form-control mb-2" placeholder="Password" autocomplete="off">

                <br>
                <div class="d-flex justify-content-between flex-sm-row flex-column">
                  <a href="signup" class="btn bg-light-success mb-2 mb-sm-0">Register</a>
                  <!-- <a href="dashboard1.html" class="btn btn-primary">Login</a> -->
                  <button class="btn btn-primary  badge-glow" name="login" type="submit">Log In</button>
                </div>
                </form> 

                <hr>
                <div class="d-flex justify-content-between align-items-center">
                  <h6 class="text-primary m-0"><a href="forgot-password">Forgot Password?</a></h6>
                  <div class="login-options">
                    <a class="btn btn-sm btn-social-icon btn-facebook mr-1"><span class="fa fa-facebook"></span></a>
                    <a class="btn btn-sm btn-social-icon btn-twitter mr-1"><span class="fa fa-twitter"></span></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Login Page Ends-->
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
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN APEX JS-->
    <script src="js/core/app-menu.min.js"></script>
    <script src="js/core/app.min.js"></script>
    <script src="js/notification-sidebar.min.js"></script>
    <script src="js/customizer.min.js"></script>
    <script src="js/scroll-top.min.js"></script>
    <!-- END APEX JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <!-- END PAGE LEVEL JS-->
    <!-- BEGIN: Custom CSS-->
    <script src="js/scripts.js"></script>
    <!-- END: Custom CSS-->

    <?php } ?>
  </body>
  <!-- END : Body-->

</html>
