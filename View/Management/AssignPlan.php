<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <?php
    require_once 'header.php';
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
        trainerList.classList.remove('active');
        userList.classList.remove('active');
        foodList.classList.remove('active');
        activityList.classList.remove('active');


        traineeList.classList.add('active');
    </script>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-14">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Trainee List - Assign Plan</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <form method="post" action="../../Control/Management/AssignPlan.php">
                                <table class="table table-striped table-bordered table-hover table-striped" id="assignPlanTable">
                                    <thead>
                                    <th style="color:black">Description</th>
                                    <th style="color:black">Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $activityPlanList = $_SESSION['allActivityPlan'];
                                        foreach ($activityPlanList as $row => $key) {
                                            echo "<tr>";
                                            echo "<td>" . $key['description'] . " </td>";
                                            if ($key['status'] == 1) {
                                                echo "<td><button name='activityPlanId' class='btn btn-xs btn-primary btn-success' disabled>selected</button></td>";
                                            } else {
                                                echo "<td><button value='" . $key['activityPlanId'] . "' name='activityPlanId' class='btn btn-primary btn-xs'>select</button></td>";
                                            }
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
            $("#assignPlanTable").DataTable();
        });
    </script>