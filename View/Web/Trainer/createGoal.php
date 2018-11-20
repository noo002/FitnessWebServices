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
    <body>
        <?php
        require_once '../../../Model/standardGoal.php';
        require_once 'header.php';
        $standardGoalList = $_SESSION['standardGoal'];
        ?>
        <script>
            $(document).ready(function () {
                $("#user_data").DataTable({
                });
            });

        </script>
        <style>
            table#user_data{
                font: 12pt Arial, Helvetica, "bitstream vera sans", sans-serif;
            }
        </style>
        <div id="content" style="width:100%;">
            <div class="container box">

                <p><b>Trainer - Goal List</b><a href="newStandardGoal.php"><button style='float: right' class='btn btn-success'><span class="glyphicon glyphicon-plus"></span> &nbsp;&nbsp; Add New Goal </button></a></p>
                <br/>



                <form method="post" action="../../../Control/Trainer/actionStandardGoal.php">
                    <table id="user_data">
                        <thead>
                            <tr>
                                <th>Goal Name</th>
                                <th>Food Intake (Calories per Day) </th>
                                <th>Activity Duration (Minutes per Day)</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <?php
                        foreach ($standardGoalList as $row => $key) {
                            $edit = '<td><button value="' . $key->standardGoalId . '" name="edit" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-pencil"></span> Edit</button></td>';
                            echo "<tr>";
                            echo "<td>$key->goalName</td>";
                            echo "<td>$key->foodIntake</td>";
                            echo "<td>$key->activityDuration</td>";
                            echo $edit;
                            echo "</tr>";
                        }
                        ?>

                    </table>
                </form>
            </div>

        </div>
    </body>
    <?php
    require_once '../footer.php';
    ?>
</html>
