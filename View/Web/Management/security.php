<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Security</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <?php
        require_once '../../../Model/managementLoginLog.php';
        require_once '../../../Model/Management.php';

        require_once 'header.php';
        $loginLog = $_SESSION['loginLog'];
        $lastSuccessfulDate = $_SESSION['lastLoginDate'];
        if (isset($_SESSION['unsuccessfulLog'])) {
            $unsuccessfulLog = $_SESSION['unsuccessfulLog'];
            $lastUnsuccessfulDate = $_SESSION['lastUnsuccessfulDate'];
        }
        ?>
        <p><b>Fitness Companion - Security </b> </p>

        <br/>
        <p><b>Successful login log</b>
        <p >Last successful Login : <?php echo $lastSuccessfulDate ?></p>
    </p>
    <div id="curve_chart" style="width: 1200px; height: 300px">

        <script type="text/javascript">
            google.charts.load('current', {packages: ['corechart', 'line']});
            google.charts.setOnLoadCallback(drawBasic);

            function drawBasic() {

                var data = new google.visualization.DataTable();
                data.addColumn('datetime', 'Time of Day');
                data.addColumn('number', 'login per time');
                //[[1,2],[3,4]]
                data.addRows([<?php
        foreach ($loginLog as $row => $key) {

            $date = $key->createAt;
            echo "[new Date($date),$row+1],";
        }
        ?>]);

                var options = {
                    hAxis: {
                        title: 'days',
                        format: 'd MMM yyyy'
                    },
                    vAxis: {
                        title: 'Time',
                        minValue: 1

                    }
                }
                ;


                var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                chart.draw(data, options);
            }
        </script>
    </div>
    <p><b>Unsuccessful login log</b>
    <p >Last unsuccessful Login : <?php
        if (isset($lastUnsuccessfulDate)) {
            echo $lastUnsuccessfulDate;
        } else {
            echo "Your account is safe";
            ?>
        <style type="text/css">
            div#unsuccessful{
                display: none;
            }
        </style>
        <?php
    }
    ?></p>

</p>

<div id="unsuccessful">

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = new google.visualization.DataTable();
            data.addColumn('datetime', 'Time of Day');
            data.addColumn('number', 'login per time');
            //[[1,2],[3,4]]
            data.addRows([<?php
    if (isset($unsuccessfulLog)) {
        foreach ($unsuccessfulLog as $row => $key) {

            $date = $key->createAt;
            echo "[new Date($date),$row+1],";
        }
    }
    ?>]);

            var options = {
                hAxis: {
                    title: 'days',
                    format: 'd MMM yyyy'
                },
                vAxis: {
                    title: 'Time',
                    minValue: 1

                }
            }
            ;


            var chart = new google.visualization.LineChart(document.getElementById('unsuccessful'));
            chart.draw(data, options);
        }
    </script>
</div>

<?php
require_once '../footer.php';
?>
</body>
</html>
