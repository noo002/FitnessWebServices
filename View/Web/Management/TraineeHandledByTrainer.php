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
        <p>
            <b><a href="../../../Control/trainerList.php">Trainer List </a> - Trainee under by <?php echo $_SESSION['trainerList'][$studentListValue]->name ?> </b>
        </p><br/>
        <div>
            <table id="traineeTable">
                <thead>
                <th>Name</th>
                <th>Activity Plan Name</th>
                <th>Gender</th>
                <th>Age</th>
                <th>Email</th>
                <th>Action</th>
                </thead>
                <?php
                foreach($traineeListByTrainer as $row){
                    echo "<tr>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['description']."</td>";
                    if($row['gender'] == 1){
                        echo "<td>Male</td>";
                    }else if($row['gender'] == 2){
                        echo "<td>Female</td>";
                    }else{
                        echo "<td>3rd gender</td>";
                    }
                    echo "<td>".$row['age']."</td>";
                    echo "<td>".$row['email']."</td>";
                    echo "<td>action</td>";
                    echo "</tr>";   
                }
                
                ?>
            </table>
        </div>


        <?php
        require_once '../footer.php';
        ?>
    </body>
</html>
