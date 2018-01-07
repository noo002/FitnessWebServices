<?php
    session_start();
    function logout(){
       session_destroy();
       header("Location: ../home.php");
    }
    if (isset($_GET['logout'])){
      logout();
    } 
    if(empty($_SESSION)){
        header("Location: ../home.php");
    } 
    else{
        $myEmail = $_SESSION['login'];
        require_once('../../Connection.php');
        
        $query = $con->prepare("SELECT id FROM management WHERE email = ?");
        $query->bind_param('s',$myEmail);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result()->fetch_assoc();
        $myId = $result['id'];
    }
    require_once 'viewProfile.php';
    require_once 'editProfile.php';
    require_once 'changePassword.php';
?>
<html>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <script>
        $(function(){
            $('.dropdown').hover(function() {
                    $(this).addClass('open');
            },
            function() {
                    $(this).removeClass('open');
            });
        });
    </script>
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
                <li ><a href="trainerList.php">Trainer</a></li>
                <li class="register"><a href="studentList.php">Student</a></li>
                <li class="register"><a href="managementList.php">Management</a></li>
                <li><a href="foodList.php">Foods Nutrient</a></li>
                <li><a href="activityList.php">Activity</a></li>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $myEmail ?><b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#" onclick="viewProfile()" style="font-size:12pt;"  ><span class="glyphicon glyphicon-user"></span> View Profile</a></li>
                            <li><a href="#" onclick="editProfile()" style="font-size:12pt;"  ><span class="glyphicon glyphicon-pencil"></span> Edit Profile</a></li>
                            <li><a href="#" onclick="changePass()" style="font-size:12pt;"  ><span class="glyphicon glyphicon-cog"></span> Change Password</a></li>
                                <li><hr/></li>
                                <li><a href="?logout" style="font-size:12pt;"  ><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                        </ul>
                    </li>
                  </ul>
              </ul>
            </div>
            <hr/>
        </div> 
        <div class="tab-content" >
        