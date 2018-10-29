<?php
require_once '../../../Model/trainee.php';
require_once '../../../Model/Management.php';
require_once 'header.php';

require_once '../../../Control/CommonFunction.php';
?>

<script src="../js/student.js" type="text/javascript"></script>
<script src="../js/trainer.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<p>
    <b>Fitness Companion - Student List </b>

</p><br/>
<form method="post" action="../../../Control/studentDetail.php">
    <table id="studentTable">
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
                . '<button name="detail" value="' . $key->traineeId . '" class="btn btn-primary btn-xs"  href="#"><span class="glyphicon glyphicon-info-sign"></span> Detail</button> &nbsp '
                . '<button name=""assignPlan" value="' . $key->traineeId . '" class="btn btn-success btn-xs" href="#"><span class="glyphicon glyphicon-pencil"></span> Assign Plan</button> </td>';
                echo '</tr>';
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>
</div>   
<div class="footer">
    <p>Copyright &copy; <a href="#">Fitness Companion</a> 2015-2018  </p>
</div>
</body>
</html>
<?php
require_once 'assignModal.php';
require_once '../Trainer/studentDetail.php';
require_once '../Trainer/graph.php';
//require_once '../footer.php';
