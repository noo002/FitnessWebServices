<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Security</title>
    </head>
    <?php
    require_once 'header.php';


    $loginLog = $_SESSION['loginLog'];
    $lastSuccessfulDate = $_SESSION['lastLoginDate'];
    if (isset($_SESSION['unsuccessfulLog'])) {
        $unsuccessfulLog = $_SESSION['unsuccessfulLog'];
        $lastUnsuccessfulDate = $_SESSION['lastUnsuccessfulDate'];
    }
    ?>   
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script>
        document.getElementById('pathLocation').innerHTML = "Security Logs";

        var dashboard = document.getElementById('dashboard');
        var traineeList = document.getElementById('traineeList');
        var activityPlan = document.getElementById('activityPlan');
        var goalList = document.getElementById('goalList');


        dashboard.classList.remove('active');
        traineeList.classList.remove('active');
        traineeList.classList.remove('active');
        goalList.classList.remove('active');

    </script>

    <div class="content">
        <div class="container-fluid">
            <div class="alert alert-danger">
                <b>Pass 30 days Logs</b>
            </div>
            <div class="row">
                
                    <div class="col-md-10">
                        <div class="card">
                            <div class="header">
                                <p class="category">
                                    <b style="color:black">Successful login log</b>
                                </p>
                                <p >Last successful Login : <?php echo $lastSuccessfulDate ?></p>
                            </div>
                            <div class="content">
                                <div id="curve_chart" >

                                    <script type="text/javascript">
                                        google.charts.load('current', {packages: ['corechart', 'line']});
                                        google.charts.setOnLoadCallback(drawBasic);

                                        function drawBasic() {

                                            var data = new google.visualization.DataTable();
                                            data.addColumn('datetime', 'Time of Day');
                                            data.addColumn('number', 'login per time');
                                            //[[1,2],[3,4]]
                                            data.addRows([<?php
    foreach ($loginLog as $row => $key) {

        $date = $key->createAt;
        echo "[new Date($date),$row+1],";
    }
    ?>]);

                                            var options = {
                                                hAxis: {
                                                    title: 'days',
                                                    format: 'd MMM yyyy'
                                                },
                                                vAxis: {
                                                    title: 'Time',
                                                    minValue: 1

                                                },
                                                width: 800,
                                                height: 400
                                            }
                                            ;


                                            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                                            chart.draw(data, options);
                                        }
                                    </script>
                                </div>
                            </div>
      
                    </div>

                    <div class="col-md-14">
                        <div class="card">
                            <div class="header">
                                <p class="category">
                                    <b style="color:black">Unsuccessful login log</b>
                                </p>
                                <p>Last unsuccessful Login : <?php
                                    if (isset($lastUnsuccessfulDate)) {
                                        echo $lastUnsuccessfulDate;
                                    } else {
                                        echo "Your account is safe";
                                        ?>
                                    <style type="text/css">
                                        div#unsuccessful{
                                            display: none;
                                        }
                                    </style>
                                    <?php
                                }
                                ?></p>
                            </div>
                            <div class="content">
                                <div id="unsuccessful">

                                    <script type="text/javascript">
                                        google.charts.load('current', {packages: ['corechart', 'line']});
                                        google.charts.setOnLoadCallback(drawBasic);

                                        function drawBasic() {

                                            var data = new google.visualization.DataTable();
                                            data.addColumn('datetime', 'Time of Day');
                                            data.addColumn('number', 'login per time');
                                            //[[1,2],[3,4]]
                                            data.addRows([<?php
                                if (isset($unsuccessfulLog)) {
                                    foreach ($unsuccessfulLog as $row => $key) {

                                        $date = $key->createAt;
                                        echo "[new Date($date),$row+1],";
                                    }
                                }
                                ?>]);

                                            var options = {
                                                hAxis: {
                                                    title: 'days',
                                                    format: 'd MMM yyyy'
                                                },
                                                vAxis: {
                                                    title: 'Time',
                                                    minValue: 1

                                                }
                                            }
                                            ;


                                            var chart = new google.visualization.LineChart(document.getElementById('unsuccessful'));
                                            chart.draw(data, options);
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php
    require_once './footer.php';

    