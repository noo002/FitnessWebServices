<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trainee Detail</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
        <?php
        require_once '../../../Model/trainer.php';
        require_once '../../../Model/trainee.php';
        require_once '../../../Model/healthRecord.php';
        require_once 'header.php';
        $traineeDetail = $_SESSION['traineeDetail'];
        $currentHeathRecord = $_SESSION['currentHealthRecord'];
        $allHealthRecord = $_SESSION['allHealthRecord'];
        $goalDetail = $_SESSION['goalDetail'];
        ?>
        <p><b><a href="../../../Control/Trainer/traineeList.php">Trainee List</a> - Trainee Detail</b></p>

        <table class="table table-bordered table-striped" align="center">
            <tr>
            <thead>
            <th colspan="2">Personal Detail</th>
        </thead>
    </tr>
    <tr>
        <td>
            <?php
            if (empty($traineeDetail->image)) {
                ?>
                <img src="../../../noimage.png" width="70px" height="70px"/>
                <?php
            } else {
                echo '<td><img src="data:image/jpeg;base64,' . $traineeDetail->image . '" width="60px" height="60px"/></td>';
            }
            ?>
        </td>
        <td><b>Name : </b> <?php echo $traineeDetail->name ?>
            <br/><b>Gender : </b> <?php
            if ($traineeDetail->gender == 1) {
                echo "Male";
            } else {
                echo "Female";
            }
            ?>
            <br/><b>Age :</b> 
            <?php
            echo $traineeDetail->birthdate;
            ?>
            <br/>
            <b>Email : </b><?php echo $traineeDetail->email ?>
        </td>
    </tr>
    <tr>
        <th colspan="2">Goal Detail</th>
    </tr>
    <td></td>
    <td>
        <b> Goal :  </b><?php echo $goalDetail['goalName'] ?><br/>
        <b>Trainee Goal Description :</b> <?php echo $goalDetail['description'] ?><br/>
        <b>Measurement : </b> : <?php echo $goalDetail['measurement'] ?>
    </td>
</table>
<p>
    <b>Current Height : </b> <?php echo $currentHeathRecord->height . " M " ?><br/>
    <b>Current Weight : </b><?php echo $currentHeathRecord->weight . " KG " ?>
</p>

<div id="healthInfo">
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'line']});
        google.charts.setOnLoadCallback(drawBasic);

        function drawBasic() {

            var data = new google.visualization.DataTable();
            data.addColumn('datetime', 'Time of Day');
            data.addColumn('number', 'Weight');
            //[[1,2],[3,4]]
            data.addRows([<?php
            foreach ($allHealthRecord as $row => $key) {

                $date = $key->createAt;
                echo "[new Date($date),$key->weight],";
            }
            ?>]);

            var options = {
                hAxis: {
                    title: 'days',
                    format: 'd MMM yyyy'
                },
                vAxis: {
                    title: 'Weight',
                    minValue: 1

                }
            }
            ;


            var chart = new google.visualization.LineChart(document.getElementById('healthInfo'));
            chart.draw(data, options);
        }
    </script>
</div>
<div id ="dietInfo">

</div>
<div id="activityInfo">

</div>


<?php
require_once '../footer.php';
?>
</body>
</html>
