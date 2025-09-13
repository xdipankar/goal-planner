<?php
     error_reporting(E_ALL);
     ini_set('display_errors', 1);    
?>
<?php date_default_timezone_set('Asia/Kolkata'); 
$date = date('Y-m-d');
?>
<?php
/*
Author: Dipankar Mohanta
Website: http://www.dipankarmohanta.com/
*/
require('inc/db.php');
require('inc/dbnew.php');
require('inc/dbpdo.php');
include("inc/auth.php"); //include auth.php file on all secure pages 
?>
<!DOCTYPE html>

<html class="loading" lang="en">
  <!-- BEGIN : Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="theme-color" content="#975AFF" />
    <meta name="author" content="Dipankar Mohanta">
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
    <link rel="stylesheet" type="text/css" href="vendors/css/chartist.min.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN APEX CSS-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="css/components.css">
    <link rel="stylesheet" type="text/css" href="css/themes/layout-dark.min.css">
    <link rel="stylesheet" href="css/plugins/switchery.min.css">
    <!-- END APEX CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="css/pages/dashboard2.min.css">
    <link rel="stylesheet" href="fonts/weathericons/css/weather-icons.min.css">
    <link rel="stylesheet" href="fonts/weathericons/css/weather-icons-wind.min.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/pages/ex-component-sweet-alerts.min.css">
    <link rel="stylesheet" href="css/pages/charts-apex.min.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/apexcharts.css">
    <!-- END: Custom CSS-->
    <script src="vendors/js/jquery.min.js"></script>
    <script type="text/javascript">
        $("document").ready(function(e){
$(".loader").fadeOut("slow");
});
    </script>

<style>
.loader{
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 999;
    background: url(images/loading6.gif) 50% 50% no-repeat #fff;
}
.gplogo{
    position: fixed;
    /*left: 0px;*/
    top: 4px;
    width: 50px;
    height: 50px;
    z-index: 999;
    background: url(img/gp2.png) 50% 0% no-repeat;
}

  .modal-body {
    max-height: calc(100vh - 210px);
    overflow-y: auto;
}
</style>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3552114773382859"
     crossorigin="anonymous"></script>
  </head>
  <!-- END : Head-->

  <!-- BEGIN : Body-->
  <body class="vertical-layout vertical-menu 2-columns  navbar-sticky" data-menu="vertical-menu" data-col="2-columns">
    <!-- <div class="loader"> </div> -->
   <div class="loader"> </div>
<?php include"sdm/core-setting.php" ?>


