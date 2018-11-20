<?php
require_once '../../../Model/trainer.php';
session_start();

require_once '../../../Control/CommonFunction.php';
$cf = new commonFunction();


if(!isset($_SESSION['trainerDetail'])){
    $path = "../home.php";
    $message = "Please login before access to system";
    $cf->messageAndRedict($message, $path);
}


require_once 'viewProfile.php';
require_once 'editProfile.php';
require_once 'changePassword.php';
?>
<html>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <head>
        <title>Fitness Companion</title>
        <link href="../css/general.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="../image/logo-small.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>

        <style>
            .tab-content{
                width: 90%;
            }
        </style>
        <script>
            function viewProfile() {
                $('#viewProfileModal').modal();
            }
            function editProfile() {
                $('#editProfileModal').modal();
            }
            function changePass() {
                $('#passwordModal').modal();
            }
        </script>
    </head>
    <body>
        <div class="header">
            <div class="container">
                <a href="#home">
                    <img src="../image/logo-small.png" id="logo" alt="Fitness Companion" class="nav navbar-nav navbar-left"/>
                </a>
                <h2>Fitness Companion</h2>
                <ul class="nav nav-tabs">
                    <li ><a href="../../../Control/Trainer/traineeList.php">Trainee</a></li>
                    <!-- <li class="register"><a href="dietPlanList.php">Meal Plan</a></li>-->
                    <li class="register"><a href="../../../Control/Trainer/activityPlanList.php">Activity Plan</a></li>
                    <li><a href="../../../Control/Trainer/foodList.php">Food Nutrient</a></li>
                    <li><a href="../../../Control/Trainer/activityList.php">Activity</a></li>
                    <li><a href="../../../Control/Trainer/goalList.php">Goal</a></li>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['trainerDetail']->email ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#" onclick="viewProfile()" style="font-size:12pt;"  ><span class="glyphicon glyphicon-user"></span> View Profile</a></li>
                                <li><a href="#" onclick="editProfile()" style="font-size:12pt;"  ><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a></li>
                                <li><a href="#" onclick="changePass()" style="font-size:12pt;"  ><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
                                <li><a href="../../../Control/Trainer/security.php" style="font-size:12pt;"><span class="glyphicon glyphicon-lock"></span>&nbsp; View Security</a></li>
                                <li><hr/></li>
                                <li><a href="../../../Control/Trainer/logout.php" style="font-size:12pt;"  ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </ul>
            </div>
            <hr/>
        </div> 
        <div class="tab-content" >

