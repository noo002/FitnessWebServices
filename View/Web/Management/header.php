<?php

session_start();


require_once 'viewProfile.php';
require_once 'editProfile.php';
require_once 'changePassword.php';
require_once '../../../Model/traineeDa.php';
require_once '../../../Model/trainee.php';



require_once '../../../Control/CommonFunction.php';



$managementEmail = $_SESSION['managementEmail'];
if (empty($managementEmail)) {
    $message = "please login first before you access to the system";
    $path = "../home.php";
    $cf = new commonFunction();
    $cf->messageAndRedict($message, $path);
}
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
                    <li ><a href="../../../Control/trainerList.php">Trainer</a></li>
                    <li class="register"><a href="../../../Control/traineeList.php">Trainee</a></li>
                    <li class="register"><a href="../../../Control/managementList.php">User</a></li>
                    <li><a href="../../../Control/foodList.php">Food </a></li>
                    <li><a href="../../../Control/activityList.php">Activity</a></li>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $managementEmail ?><b class="caret"></b></a>

                            <ul class="dropdown-menu">
                                <li><a href="#" onclick="viewProfile()" style="font-size:12pt;"  ><span class="glyphicon glyphicon-user"></span> View Profile</a></li>
                                <li><a href="#" onclick="editProfile()" style="font-size:12pt;"  ><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a></li>
                                <li><a href="#" onclick="changePass()" style="font-size:12pt;"  ><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
                                <li><a href="../../../Control/security.php" style="font-size:12pt;"><span class="glyphicon glyphicon-lock"></span>&nbsp; View Security Logs</a></li>
                                <li><hr/></li>

                                <li><a href="../../../Control/managementLogout.php" style="font-size:12pt;"  ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>

                            </ul>

                        </li>
                    </ul>
                </ul>
            </div>
            <hr/>
        </div> 
        <div class="tab-content" >
            <div>
                <!--write your code inside here to do registration--->
            </div>