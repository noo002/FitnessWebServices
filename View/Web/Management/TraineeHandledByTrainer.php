<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Trainee Handled by Trainer</title>

    </head>
    <body>
        <?php
        require_once '../../../Model/Management.php';
        require_once '../../../Model/trainer.php';
        require_once '../../../Model/trainee.php';
        require_once 'header.php';

        $studentListValue = $_SESSION['studentListValue'];
        $traineeListByTrainer = $_SESSION['traineeListByTrainer'];
        ?>
        <script>
            $(document).ready(function () {
                $("#traineeTable").dataTable();
            });
        </script>
        <style>
            table thead th{
                font-size: 17px;
            }
            table tr td{
                font-size: 12pt;
            }
        </style>
        <p>
            <b><a href="../../../Control/trainerList.php">Trainer List </a> - Trainee under by <?php echo $_SESSION['trainerList'][$studentListValue]->name ?> </b>
        </p><br/>
        <div>
            <form method="post" action="">
                <table id="traineeTable" class="dataTable">
                    <thead>
                    <th>Name</th>
                    <th>Activity Plan Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Email</th>
                    <th>Action</th>
                    </thead>
                    <?php
                    foreach ($traineeListByTrainer as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['description'] . "</td>";
                        if ($row['gender'] == 1) {
                            echo "<td>Male</td>";
                        } else if ($row['gender'] == 2) {
                            echo "<td>Female</td>";
                        } else {
                            echo "<td>3rd gender</td>";
                        }
                        echo "<td>" . $row['age'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td><button value='".$row['traineeId']."' class='btn btn-success btn-xs'>View Detail</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </table>
            </form>
        </div>


        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
