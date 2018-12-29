<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trainee Detail</title>
    </head>
    <?php
    require_once 'header.php';

    $traineeDetail = $_SESSION['traineeDetail'];
    $currentHeathRecord = $_SESSION['currentHealthRecord'];
    $allHealthRecord = $_SESSION['allHealthRecord'];
    $goalDetail = $_SESSION['goalDetail'];
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        document.getElementById('pathLocation').innerHTML = "Trainee List";

        var dashboard = document.getElementById('dashboard');
        var trainerList = document.getElementById('trainerList');
        var traineeList = document.getElementById('traineeList');
        var userList = document.getElementById('userList');
        var foodList = document.getElementById('foodList');
        var activityList = document.getElementById('activityList');


        dashboard.classList.remove('active');
        trainerList.classList.remove('active');
        userList.classList.remove('active');
        foodList.classList.remove('active');
        activityList.classList.remove('active');


        traineeList.classList.add('active');
    </script>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <b>Personal Detail</b>
                        </div>
                        <div class="content">
                            <?php
                            if (empty($traineeDetail->image)) {
                                ?>
                                <img src="../../Control/Management/noimage.png" width="70px" height="70px"/>
                                <?php
                            } else {
                                echo '<img src="data:image/jpeg;base64,' . $traineeDetail->image . '" width="60px" height="60px"/></td>';
                            }
                            ?>
                            <br/>
                            <b>Name : </b> <?php echo $traineeDetail->name ?>
                            <br/><b>Gender : </b> <?php
                            if ($traineeDetail->gender == 1) {
                                echo "Male";
                            } else {
                                echo "Female";
                            }
                            ?>
                            <br/><b>Age :</b> 
                            <?php
                            echo $traineeDetail->birthdate;
                            ?>
                            <br/>
                            <b>Email : </b><?php echo $traineeDetail->email ?>

                            <br/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <b>Goal Detail</b>
                            <br/><br/>
                        </div>
                        <div class="content">
                            <b> Goal :  </b><?php echo $goalDetail['goalName'] ?><br/>
                            <b>Trainee Goal Description :</b> <?php echo $goalDetail['description'] ?><br/>
                            <b>Measurement : </b> : <?php echo $goalDetail['measurement'] ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <p>
                                <b>Current Height : </b> <?php echo $currentHeathRecord->height . " M " ?><br/>
                                <b>Current Weight : </b><?php echo $currentHeathRecord->weight . " KG " ?>
                            </p>
                        </div>
                        <div class="content">
                            <div id="healthInfo">
                                <script type="text/javascript">
                                    google.charts.load('current', {packages: ['corechart', 'line']});
                                    google.charts.setOnLoadCallback(drawBasic);

                                    function drawBasic() {

                                        var data = new google.visualization.DataTable();
                                        data.addColumn('datetime', 'Time of Day');
                                        data.addColumn('number', 'Weight');
                                        //[[1,2],[3,4]]
                                        data.addRows([<?php
                            foreach ($allHealthRecord as $row => $key) {

                                $date = $key->createAt;
                                echo "[new Date($date),$key->weight],";
                            }
                            ?>]);

                                        var options = {
                                            hAxis: {
                                                title: 'days',
                                                format: 'd MMM yyyy'

                                            },
                                            vAxis: {
                                                title: 'Weight',
                                                minValue: 1

                                            }
                                        }
                                        ;


                                        var chart = new google.visualization.LineChart(document.getElementById('healthInfo'));
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
    <?php
    require_once 'footer.php';
    