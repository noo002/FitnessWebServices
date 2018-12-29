<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trainer List</title>
    </head>
    <?php
    require_once 'header.php';
    ?>
    <script>
        document.getElementById('pathLocation').innerHTML = "Trainer List";

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
                            <h4 class="title">Trainer List</h4>
                            <p>
                                <?php 
                                for($d = 0;$d<221;$d++){
                                    echo "&nbsp;";
                                }
                                ?>
                                <a href="trainerRegistration.php"><button class='btn btn-success'>Insert New Trainer</button></a>
                            </p>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <form method="post" action="../../Control/Management/actionTrainerList.php">
                                <table class="table table-striped table-bordered table-hover table-striped" id="trainerListTable">
                                    <thead>
                                    <th style="color:black">Name</th>
                                    <th style="color:black">Gender</th>
                                    <th style="color:black">Email</th>
                                    <th style="color:black">Total Trainee</th>
                                    <th style="color:black">Certificate</th>
                                    <th style="color:black">Status</th>
                                    <th style="color:black">Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $trainerList = $_SESSION['trainerList'];
                                        foreach ($trainerList as $row => $key) {
                                            echo "<tr>";
                                            echo "<td>$key->name</td>";
                                            if ($key->gender == 1) {
                                                echo "<td>Male</td>";
                                            } else {
                                                echo "<td>Female</td>";
                                            }

                                            echo "<td>$key->email</td>";
                                            echo "<td style='text-align:center'>$key->totalTrainee</td>";
                                            echo "<td>$key->certificate</td>";

                                            $active = "<button class='btn btn-primary btn-xs' name='activation' value='$key->id'>Active</button></td>";
                                            $inactive = "<button class='btn btn-danger btn-xs' name='activation' value='$key->id'>Inactive</button></td>";
                                            $studentList = '<td class="text-center"><button name="detail" value="' . $key->id . '" class="btn btn-primary btn-xs">Detail</button>&nbsp;<button class="btn btn-primary btn-xs" name="studentList" value=' . $key->id . '>Student List</button>&nbsp; ';
                                            if ($key->status == 1) {
                                                echo "<td>Active </td>";
                                                echo $studentList;
                                                echo $inactive;
                                            } else if ($key->status == 0) {
                                                echo "<td>Inactive </td>";
                                                echo $studentList;
                                                echo $active;
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
    require_once './footer.php';
    ?>
    <script>
        $(document).ready(function () {
            $("#trainerListTable").DataTable();
        });
    </script>