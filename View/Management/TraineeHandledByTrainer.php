<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trainee List</title>
    </head>
    <?php
//    require_once '../../../Model/Management.php';
//        require_once '../../../Model/trainer.php';
//        require_once '../../../Model/trainee.php';

    require_once 'header.php';
    $studentListValue = $_SESSION['studentListValue'];
    $traineeListByTrainer = $_SESSION['traineeListByTrainer'];
    ?>
    <script>
        document.getElementById('pathLocation').innerHTML = "Trainee List";

        var dashboard = document.getElementById('dashboard');
        var trainerList = document.getElementById('trainerList');
        var traineeList = document.getElementById('traineeList');
        var userList = document.getElementById('userList');
        var foodList = document.getElementById('foodList');
        var activityList = document.getElementById('activityList');


        dashboard.classList.remove('active');
        traineeList.classList.remove('active');
        userList.classList.remove('active');
        foodList.classList.remove('active');
        activityList.classList.remove('active');


        trainerList.classList.add('active');
    </script>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-14">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Trainee List - under by <?php echo $_SESSION['trainerList'][$studentListValue]->name ?></h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <form method="post" action="../../Control/Management/traineeDetail.php">
                                <table class="table table-striped table-bordered table-hover table-striped" id="traineeListTable">
                                    <thead>
                                    <th style="color:black">Name</th>
                                    <th style="color:black">Activity Plan Name</th>
                                    <th style="color:black">Gender</th>
                                    <th style="color:black" >Age</th>
                                    <th style="color:black">Email</th>
                                    <th style="color:black">Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($traineeListByTrainer as $row) {
                                            echo "<tr>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['description'] . "</td>";
                                            if ($row['gender'] == 1) {
                                                echo "<td>Male</td>";
                                            } else if ($row['gender'] == 2) {
                                                echo "<td>Female</td>";
                                            } else {
                                                echo "<td>3rd gender</td>";
                                            }
                                            echo "<td>" . $row['age'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td><button value='" . $row['traineeId'] . "' name='detail' class='btn btn-success btn-xs'>View Detail</button></td>";
                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <?php
    require_once 'footer.php';
    ?>
    <script>
        $(document).ready(function () {
            $("#traineeListTable").DataTable();
        });
    </script>