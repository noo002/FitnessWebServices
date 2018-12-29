<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="../../View/images/logo-small.png">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Header</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

        <!-- Animation library for notifications   -->
        <link href="assets/css/animate.min.css" rel="stylesheet"/>

        <!--  Light Bootstrap Table core CSS    -->
        <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>


        <!--  CSS for Demo Purpose, don't include it in your project     -->
        <link href="assets/css/demo.css" rel="stylesheet" />


        <!--     Fonts and icons     -->
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />





    </head>
    <body>
        <?php
        require_once '../../Model/trainer.php';
        require_once '../../Model/Management.php';
        require_once '../../Model/trainer.php';
        require_once '../../Model/trainee.php';
        require_once '../../Model/healthRecord.php';
        require_once '../../Model/food.php';
        require_once '../../Model/activity.php';
        require_once '../../Model/managementLoginLog.php';
        session_start();


        if (empty($_SESSION['managementDetail'])) {
            require_once '../../Control/CommonFunction/CommonFunction.php';
            $cf = new commonFunction();
            $path = "../Login/managementLogin.html";
            $cf->redicrect($path);
        }
        ?>
        <div class="wrapper">
            <div class="sidebar" data-color="rgba(27,27,27,1);" data-image="assets/img/sidebar-5.jpg">

                <!--
            
                    Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
                    Tip 2: you can also add an image using data-image tag
            
                -->

                <div class="sidebar-wrapper">
                    <div class="logo">
                        <a href="http://www.creative-tim.com" class="simple-text">
                            Management
                        </a>
                    </div>

                    <ul class="nav">
                        <li class="active" id="dashboard">
                            <a href="../../Control/Management/dashboard.php">
                                <i class="pe-7s-graph"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li id="trainerList">
                            <a href="../../Control/Management/trainerList.php">
                                <i class="pe-7s-note2"></i>
                                <p>Trainer List</p>
                            </a>
                        </li>
                        <li id="traineeList">
                            <a href="../../Control/Management/traineeList.php">
                                <i class="pe-7s-news-paper"></i>
                                <p>Trainee List</p>
                            </a>
                        </li>
                        <li id="userList">
                            <a href="../../Control/Management/managementList.php">
                                <i class="pe-7s-science"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li id="foodList">
                            <a href="../../Control/Management/foodList.php">
                                <i class="pe-7s-map-marker"></i>
                                <p>Food List</p>
                            </a>
                        </li>
                        <li id="activityList"> 
                            <a href="../../Control/Management/activityList.php">
                                <i class="pe-7s-bell"></i>
                                <p>Activity List</p>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

            <div class="main-panel">
                <nav class="navbar navbar-default navbar-fixed">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#" id="pathLocation">asdasd</a>
                        </div>
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <p>
                                            Account
                                            <b class="caret"></b>
                                        </p>

                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="changePassword.php">Change Password</a></li>
                                        <li class="divider"></li>
                                        <li><a href="../../Control/Management/security.php">Security Logs</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="../../Control/Management/logout.php">
                                        <p>Log out</p>
                                    </a>
                                </li>
                                <li class="separator hidden-lg"></li>
                            </ul>
                        </div>
                    </div>
                </nav>