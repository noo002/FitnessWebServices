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
    $trainerTrackLog = $_SESSION['trainerTrackLog'];
    ?>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
            <div id="row">
                <div class="alert alert-danger">
                    <b>Pass 30 days Logs</b>
                </div>
                <div class="header">
                    <p class="category">
                        <b>Trainer Detail</b>
                    </p>
                </div>
                <div class="col-md-14">
                    <div class="card">
                        <div id="columnchart_values" style="width: auto; height: 300px;"></div>
                        <script type="text/javascript">
                            google.charts.load("current", {packages: ['corechart']});
                            google.charts.setOnLoadCallback(drawChart);
                            function drawChart() {
                                var data = google.visualization.arrayToDataTable([
                                    ["Element", "time", {role: "style"}],
<?php
/* this place is let you know the 1,2,3,4 is for what
  foreach ($trainerTrackLog as $row => $key) {
  if ($row == 0) {
  echo '["View Trainer Detail",' . $key['Total'] . ' , "red"],';
  } else if ($row == 1) {
  echo '["Edit Activity Plan",' . $key['Total'] . ' , "red"],';
  } else if ($row == 2) {
  echo '["Assign Activity Into plan",' . $key['Total'] . ' , "red"],';
  } else if ($row == 3) {
  echo '["Assign Diet into Plan",' . $key['Total'] . ' , "red"],';
  } else if ($row == 4) {
  echo '["View Feedback",' . $key['Total'] . ' , "red"],';
  } else if ($row == 5) {
  echo '["View Food",' . $key['Total'] . ' , "red"],';
  } else if ($row == 6) {
  echo '["View Activity",' . $key['Total'] . ' , "red"],';
  } else if ($row == 7) {
  echo '["Register New standard Goal",' . $key['Total'] . ' , "red"],';
  } else if ($row == 8) {
  echo '["Edit Standard Goal",' . $key['Total'] . ' , "red"],';
  } else if ($row == 9) {
  echo '["Remove Activity from Plan",' . $key['Total'] . ' , "red"],';
  } else if ($row == 10) {
  echo '["Remove Diet from Plan",' . $key['Total'] . ' , "red"],';
  }
 *  */
foreach ($trainerTrackLog as $row => $key) {
    if ($row == 0) {
        echo '["View Trainer Detail",' . $key['Total'] . ' , "red"],';
    } else if ($row == 1) {
        echo '["Edit Activity Plan",' . $key['Total'] . ' , "red"],';
    } else if ($row == 2) {
        echo '["Assign Activity Into plan",' . $key['Total'] . ' , "red"],';
    } else if ($row == 3) {
        echo '["Assign Diet into Plan",' . $key['Total'] . ' , "red"],';
    } else if ($row == 4) {
        echo '["View Feedback",' . $key['Total'] . ' , "red"],';
    } else if ($row == 7) {
        echo '["Register New standard Goal",' . $key['Total'] . ' , "red"],';
    } else if ($row == 8) {
        echo '["Edit Standard Goal",' . $key['Total'] . ' , "red"],';
    } else if ($row == 9) {
        echo '["Remove Activity from Plan",' . $key['Total'] . ' , "red"],';
    } else if ($row == 10) {
        echo '["Remove Diet from Plan",' . $key['Total'] . ' , "red"],';
    }
}
?>
                                ]);

                                var view = new google.visualization.DataView(data);
                                view.setColumns([0, 1,
                                    {calc: "stringify",
                                        sourceColumn: 1,
                                        type: "string",
                                        role: "annotation"},
                                    2]);

                                var options = {
                                    title: "Trainer Activities",
                                    width: 1070,
                                    height: 400,
                                    bar: {groupWidth: "95%"},
                                    legend: {position: "none"},
                                };
                                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                                chart.draw(view, options);
                            }
                        </script>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <br/><br/><br/>
    <?php
    require_once './footer.php';
    ?>
