<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trainer Detail</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <?php
        require_once '../../../Model/Management.php';
        require_once './header.php';

        $trainerTrackLog = $_SESSION['trainerTrackLog'];
        ?>
        <p>
            <b>Fitness Companion - Trainer Detail </b>
        </p><br/>
        <div id="columnchart_values" style="width: 1500px; height: 300px;"></div>
        <script type="text/javascript">
            google.charts.load("current", {packages: ['corechart']});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ["Element", "time", {role: "style"}],
<?php
foreach ($trainerTrackLog as $row => $key) {
    if ($row == 0) {
        echo '["View Trainer Detail",' . $key['Total'] . ' , "red"],';
    } else if ($row == 1) {
        echo '["Edit Activity Plan",' . $key['Total'] . ' , "red"],';
    } else if ($row == 2) {
        echo '["Assign Activity Into plan",' . $key['Total'] . ' , "red"],';
    } else if ($row == 3) {
        echo '["Edit Diet into Plan",' . $key['Total'] . ' , "red"],';
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
        echo '["Remove Die from Plan",' . $key['Total'] . ' , "red"],';
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
                    title: "Trainer Activation",
                    width: 1200,
                    height: 400,
                    bar: {groupWidth: "95%"},
                    legend: {position: "none"},
                };
                var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
                chart.draw(view, options);
            }
        </script>
        <br/><br/><br/><br/><br/><br/>
        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
