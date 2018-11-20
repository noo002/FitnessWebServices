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
    <body>
        <?php
        require_once 'header.php';
        ?>
        <script>
            $(document).ready(function () {
                $("#myTable").dataTable();
            });
        </script>
        <style type="text/css">
            table#myTable{
                font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
                font-size: 12pt;
            }
        </style>
        <p><b>Trainer - Activity Plan List</b><a href="newActivityPlan.php"><button  style='float: right' class='btn btn-success'><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp; New Activity Plan </button></a></p>
        <br/>
        <form method="post" action="../../../Control/Trainer/activityPlanListDetail.php">
            <table id="myTable" >
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Number of Activity</th>
                        <th>Number of Diet</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $activityPlanList = $_SESSION['activityPlanList'];
                    foreach ($activityPlanList as $row => $key) {
                        echo "<tr>";
                        echo "<td>" . $key['description'] . "</td>";
                        echo "<td>" . $key['NumberActivity'] . "</td>";
                        echo "<td>" . $key['NumberFood'] . "</td>";
                        echo "<td><button name='edit' value=" . $key['activityPlanId'] . " class='btn btn-primary btn-xs'>Edit</button>&nbsp;&nbsp;<button name='detail'class='btn btn-primary btn-xs' value=" . $key['activityPlanId'] . "><span class='glyphicon glyphicon-info-sign'></span>&nbsp;&nbsp;Detail</button>&nbsp;&nbsp;"
                        . "<button name='feedback' value=" . $key['activityPlanId'] . " class='btn btn-success btn-xs'><span class='glyphicon glyphicon-pencil'></span>&nbsp;&nbsp;Feedback</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </form>

        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
