<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Activity Plan List</title>
    </head>
    <?php
    require_once 'header.php';
    $description = $_SESSION['activityPlanDescription'];
    ?>
    <script>
        document.getElementById('pathLocation').innerHTML = "Activity Plan List";

        var dashboard = document.getElementById('dashboard');
        var traineeList = document.getElementById('traineeList');
        var activityPlan = document.getElementById('activityPlan');
        var goalList = document.getElementById('goalList');


        dashboard.classList.remove('active');
        traineeList.classList.remove('active');
        traineeList.classList.remove('active');
        goalList.classList.remove('active');


        activityPlan.classList.add('active');
    </script>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header">
                            <b>Trainer - Edit Activity Plan Name </b>
                        </div>
                        <div class="content">
                            <form method="post" action="../../Control/Trainer/editActivityPlan.php">
                                <table class="table table-bordered table-striped" align="center">
                                    <tr>
                                        <th>Change Activity Plan</th>
                                        <td><input placeholder="Enter your Activity Plan Name" required class="form-control" type="text" name="activityPlanName" value="<?php echo $description ?>" /></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <input type="submit" class="btn btn-xs btn-success" value="Edit" />&nbsp;&nbsp;
                                            <input type="reset" class="btn btn-xs btn-danger" value="Reset" />
                                        </td>
                                    </tr>
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

    