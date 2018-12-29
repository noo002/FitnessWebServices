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
        <link rel="icon" type="image/png" href="../../View/images/logo-small.png">
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
                                <h4 class="title">Activity List</h4>
                                <p>
                                    <?php
                                    for ($d = 0; $d < 221; $d++) {
                                        echo "&nbsp;";
                                    }
                                    ?>
                                    <a href="newActivity.php"><button class='btn btn-success'>Insert New Activity</button></a>
                                </p>
                            </div>
                            <div class="content table-responsive table-full-width">
                                <form method="post" action="../../Control/Management/actionActivity.php">
                                    <table class="table table-striped table-bordered table-hover table-striped" id="activityListTable" >
                                        <thead>
                                            <tr>
                                                <th style="color:black">Image</th>
                                                <th style="color:black">Name</th>
                                                <th style="color:black">Calories burn per minutes</th>
                                                <th style="color:black">Recommended Duration (minutes)</th>
                                                <th style="color:black">Status</th>
                                                <th style="color:black">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $activityList = $_SESSION['activityList'];
                                            foreach ($activityList as $row => $key) {
                                                echo "<tr>";
                                                if ($key->image == null) {
                                                    echo "<td><img src='../../../noimage.png' width='60px' height='60px'/> </td>";
                                                } else {
                                                    // echo '<img src="data:image/jpeg;base64,'.base64_encode( $key['image'] ).'"/>';
                                                    echo '<td><img src="data:image/jpeg;base64,' . $key->image . '" width="60px" height="60px"/></td>';
                                                }
                                                echo "<td>$key->name</td>";
                                                echo "<td>$key->caloriesBurnPerMin</td>";
                                                echo "<td>$key->suggestedDuration</td>";
                                                $edit = '<td><button value="' . $key->activityId . '" name="edit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</button>&nbsp;&nbsp;';
                                                $Inactive = '<button value="' . $key->activityId . '"  name="status" class="btn btn-danger btn-xs"><span class="glyphicon glyphicon-trash"></span> Inactive</button></td>';
                                                $active = '<button value="' . $key->activityId . '"  name="status" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-trash"></span> Active</button></td>';
                                                if ($key->status == 1) {
                                                    // mean active;
                                                    echo "<td>Active</td>";
                                                    echo $edit;
                                                    echo $Inactive;
                                                } else if ($key->status == 2) {
                                                    echo "<td>Inactive</td>";
                                                    echo $edit;
                                                    echo $active;
                                                } else {
                                                    echo "<td>Error occur</td>";
                                                    echo $edit;
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
                $("#activityListTable").DataTable();
            });
        </script>