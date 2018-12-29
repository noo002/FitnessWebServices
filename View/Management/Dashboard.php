<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dashboard</title>
        <link href="../images/logo-small.png" rel="icon"/>
    </head>
    <body>
        <?php
        require_once 'header.php';
        ?>
        <script>
            document.getElementById('pathLocation').innerHTML = "Dashboard";
        </script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Total User</h4>

                            </div>
                            <div class="content">
                                <div class="footer">
                                    <div class="legend">
                                        <b> <i class="pe-7s-users"></i> Total User : <?php echo $_SESSION['totalNumber']['totalManagement'] ?></b>

                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Information are reliable
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Total Trainer</h4>

                            </div>
                            <div class="content">
                                <div class="footer">
                                    <div class="legend">
                                        <b> <i class="pe-7s-users"></i> Total Trainer : <?php echo $_SESSION['totalNumber']['totalTrainer'] ?></b>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Total Activity</h4>

                            </div>
                            <div class="content">
                                <div class="footer">
                                    <div class="legend">
                                        <b> <i class="pe-7s-users"></i> Total Activity : <?php echo $_SESSION['totalNumber']['totalActivity'] ?></b>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Total Food</h4>

                            </div>
                            <div class="content">
                                <div class="footer">
                                    <div class="legend">
                                        <b> <i class="pe-7s-users"></i> Total Food : <?php echo $_SESSION['totalNumber']['totalFood'] ?></b>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Total Trainee</h4>
      
                            </div>
                            <div class="content">
                                <div class="footer">
                                    <div class="legend">
                                        <b> <i class="pe-7s-users"></i> Total Trainee : <?php echo $_SESSION['totalNumber']['totalTrainee'] ?></b>
                                    </div>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-history"></i> Updated 3 minutes ago
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-------- below div is row  -------->
                </div>
            </div>
        </div>

        <?php
        require_once './footer.php';
        ?>

</html>