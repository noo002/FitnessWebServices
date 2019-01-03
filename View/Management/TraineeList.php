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
                            <h4 class="title">Trainee List</h4>
                        </div>
                        <div class="content table-responsive table-full-width">
                            <form method="post" action="../../Control/Management/traineeDetail.php">
                                <table class="table table-striped table-bordered table-hover table-striped" id="traineeListTable">
                                    <thead>
                                    <th style="color:black">Name</th>
                                    <th style="color:black">Gender</th>
                                    <th style="color:black">Have Assigned?</th>
                                    <th style="color:black">Email</th>
                                    <th style="color:black">Status</th>
                                    <th style="color:black">Action</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $allTrainee = $_SESSION['allTrainee'];
                                        foreach ($allTrainee as $row => $key) {
                                            echo "<tr>";
                                            echo "<td>" . $key['name'] . "</td>";
                                            if ($key['gender'] == 1) {
                                                echo "<td>Male</td>";
                                            } else {
                                                echo "<td>Female</td>";
                                            }
                                            if ($key['isAssign'] == 1) {
                                                echo "<td>Yes</td>";
                                            }
                                            if ($key['isAssign'] == 0) {
                                                echo "<td>No</td>";
                                            }
                                            echo "<td>" . $key['email'] . "   </td>";
                                            if ($key['status'] == 1) {
                                                echo "<td>Active</td>";
                                            } else {
                                                echo "<td>Inactive</td>";
                                            }
                                            echo '<td class="text-center">'
                                            . '<button name="detail" value="' . $key['traineeId'] . '" class="btn btn-primary btn-xs"  href="#"><span class="glyphicon glyphicon-info-sign"></span> Detail</button> &nbsp '
                                            . '<button name="assignPlan" value="' . $key['traineeId'] . '" class="btn btn-success btn-xs" href="#"><span class="glyphicon glyphicon-pencil"></span> Assign Plan</button> </td>';
                                            echo '</tr>';
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