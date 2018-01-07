<html>
    <meta http-equiv='cache-control' content='no-cache'>
    <meta http-equiv='expires' content='0'>
    <meta http-equiv='pragma' content='no-cache'>
    <head>
        <title>Fitness Companion</title>
        <link href="css/general.css" rel="stylesheet" type="text/css"/>
        <link rel="shortcut icon" type="image/x-icon" href="image/logo-small.png" />
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.2/css/jquery.dataTables.min.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="http://cdn.datatables.net/1.10.2/js/jquery.dataTables.min.js"></script>
        <script src="js/general.js" type="text/javascript"></script>
    </head>
    <body>
        <div class="header">
            <div class="container">
              <a href="#home">
                <img src="image/logo-small.png" id="logo" alt="Fitness Companion" class="nav navbar-nav navbar-left"/>
              </a>
              <h2>Fitness Companion</h2>
              <ul class="nav nav-tabs">
                <li ><a href="home.php">Home</a></li>
                <li class="register"><a href="register.php">Register</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-log-in"></span> Login<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                                <li><a href="#" id='trainer' style="font-size:12pt;">Trainer</a></li>
                                <li><a href="#" id='management' style="font-size:12pt;">Management</a></li>
                        </ul>
                    </li>
                  </ul>
              </ul>
            </div>
            <hr/>
        </div> 
        <div class="tab-content" >
        <?php require_once 'trainerLogin.php';
              require_once 'managementLogin.php';
              require_once 'managementPassword.php';
              require_once 'trainerPassword.php';
        ?>