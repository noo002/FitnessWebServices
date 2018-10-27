<?php
require_once '../../../Model/trainer.php';
require_once '../../../Model/Management.php';
require_once 'header.php';
?>
<script src="../js/trainerAdmin.js" type="text/javascript"></script>

<p>
    <b>Fitness Companion - Trainer List </b>
    <a href="trainerRegistration.php"><button style="float:right" class='btn btn-success'><span class="glyphicon glyphicon-plus"></span>Insert New Trainer</button></a>
</p><br/>
<form method="post" action="../../../Control/actionStudentList.php">
    <table id="trainerTable">
        <thead>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Certificate</th>
        <th>Year of Experience</th>
        <th>Status</th>
        <th>Action</th>
        </thead>
        <tbody>
            <?php
            $trainerList = $_SESSION['trainerList'];
            foreach ($trainerList as $row => $key) {
                echo "<tr>";
                echo "<td>$key->name</td>";
                if ($key->gender == 1) {
                    echo "<td>Male</td>";
                } else {
                    echo "<td>Female</td>";
                }

                echo "<td>$key->email</td>";
                echo "<td>$key->certificate</td>";
                echo "<td>$key->experience</td>";
                $active = "<button class='btn btn-primary btn-xs' name='activation' value='$key->id'><span class='glyphicon glyphicon-ok'></span>Active</button></td>";
                $inactive = "<button class='btn btn-danger btn-xs' name='activation' value='$key->id'><span class='glyphicon glyphicon-remove'></span>Inactive</button></td>";
                $studentList = '<td class="text-center"><button class="btn btn-primary btn-xs" name="studentList" value='.$key->id.'><span class="glyphicon glyphicon-info-sign"></span> Student List</button>&nbsp; ';
                if ($key->status == 1) {
                    echo "<td>Active </td>";
                    echo $studentList;
                    echo $inactive;
                    
                } else if ($key->status == 0) {
                    echo "<td>Inactive </td>";
                    echo $studentList;
                    echo $active;
                }
                
                
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</form>
<?php
//  require_once 'studentModal.php';
require_once 'editTrainer.php';
require_once 'newTrainer.php';
require_once '../footer.php';
