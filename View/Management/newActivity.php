<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Activity List</title>
    </head>
    <body>
        <?php
        require_once 'header.php';
        ?>
        <script>
            document.getElementById('pathLocation').innerHTML = "Activity List";

            var dashboard = document.getElementById('dashboard');
            var trainerList = document.getElementById('trainerList');
            var traineeList = document.getElementById('traineeList');
            var userList = document.getElementById('userList');
            var foodList = document.getElementById('foodList');
            var activityList = document.getElementById('activityList');


            dashboard.classList.remove('active');
            traineeList.classList.remove('active');
            userList.classList.remove('active');
            trainerList.classList.remove('active');
            foodList.classList.remove('active');


            activityList.classList.add('active');
        </script>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-14">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Activity List - new activity</h4>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form method="post" action="../../Control/Management/newActivity.php" enctype="multipart/form-data">
                                    <table class="table table-bordered table-striped" align="center">
                                        <tr>
                                            <th>Select New Photo</th>
                                            <td>  <input type="file" name="fileToUpload" id="" class="form-control" accept="image/*"></td>
                                        </tr>
                                        <tr>
                                            <th>Activity Name</th>
                                            <td> <input type="text" name="name" maxlength="255" class="form-control" placeholder="Enter activity name" required/></td>
                                        </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td> <textarea name="desc"  cols="40" rows="3" maxlength="255" class="form-control" placeholder="Enter description" required/></textarea ></td>
                                        </tr>
                                        <tr>
                                            <th>Calories burn per minutes</th>
                                            <td> <input type="number" name="calories" min="1" class="form-control" placeholder="Enter calories" required/></td>
                                        </tr>
                                        <tr>
                                            <th>Recommended time(minutes)</th>
                                            <td>  <input type="number" name="recommendTime" min="1" class="form-control" placeholder="Enter minutes" required/></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><input type="submit" value="Add"class="btn btn-primary btn-xs" />
                                                <input type="reset" value="Reset"  class="btn btn-xs btn-danger delete"/></td>
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
        ?>
