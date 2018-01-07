<?php require_once 'header.php';?>
<script src="../js/student.js" type="text/javascript"></script>
<script src="../js/trainer.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<table id="studentTable">
    <thead>
        <th>Name</th>
        <th>Gender</th>
        <th>Date of Birth</th>
        <th>Email</th>
        <th>Status</th>
        <th>Action</th>
    </thead>
    <tbody>
        <?php 
        
            $query = $con->prepare("SELECT * FROM user ORDER BY name");
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            while($row = $result->fetch_Array()) {
                $gender = 'Male';
                if($row[2]=='1') {
                    $gender = 'Female';
                }
                $status = 'Assigned Trainer';
                if($row[9]==null){
                    $status = 'Not yet Assigned Trainer';
                }
                echo '<tr>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$gender.'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[6].'</td>';
                echo '<td>'.$status.'</td>';
                echo '<td class="text-center">'
                . '<a class="btn btn-primary btn-xs" onclick="detailUser('.$row[0].')" href="#"><span class="glyphicon glyphicon-info-sign"></span> Detail</a> &nbsp '
                        . '<a class="btn btn-success btn-xs" onclick="assignTrainer('.$row[0].')" href="#"><span class="glyphicon glyphicon-pencil"></span> Assign Trainer</a> </td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>
<?php 
require_once 'assignModal.php';
require_once '../Trainer/studentDetail.php';
require_once '../Trainer/graph.php';
require_once '../footer.php';?>