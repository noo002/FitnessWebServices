<?php 
/*
require_once '../../../Model/trainee.php';
require_once '../../../Model/Management.php';
require_once 'header.php';
 *  */
require_once '../../../Model/trainee.php';
require_once '../../../Model/trainer.php';
require_once 'header.php'; 

?>
<script src="../js/trainer.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<p>
    <b>Trainer - Trainee List </b>

</p><br/>
<form action="../../../Control/Trainer/traineeDetail.php" method="post">
    <table id="myTable">
        <thead>
        <th>Name</th>
        <th>Gender</th>
        <th>Date of Birth(Y-M-D)</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
            $allTrainee = $_SESSION['allTrainee'];
            foreach ($allTrainee as $row => $key) {
                echo "<tr>";
                echo "<td>$key->name</td>";
                if ($key->gender == 1) {
                    echo "<td>Male</td>";
                } else {
                    echo "<td>Female</td>";
                }
                echo "<td>$key->birthdate</td>";
                echo "<td>$key->email</td>";
                echo "<td>$key->status</td>";
                echo '<td class="text-center">'
                . '<button name="detail" value="' . $key->traineeId . '" class="btn btn-primary btn-xs"  href="#"><span class="glyphicon glyphicon-info-sign"></span> Detail</button> </td>';
                echo '</tr>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>
<?php
//require_once '../Assign/newActivityPlan.php';
//require_once '../Assign/activityPlanList.php';
//require_once 'studentDetail.php';
//require_once 'graph.php';
require_once '../footer.php';
?>

