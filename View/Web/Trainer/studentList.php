<?php require_once 'header.php';?>
<script src="../js/trainer.js" type="text/javascript"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<table id="myTable" class="display table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = $con->prepare("SELECT id,name,gender,dob,email FROM user WHERE trainer_id = ?");
            $query->bind_param('i',$myId);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            while($row = $result->fetch_Array()) {
                $gender ='Male';
                if($row[2]==1) {
                    $gender ='Female';
                }
                echo '<tr>';
                echo '<td>'.$row[1].'</td>';
                echo '<td>'.$gender.'</td>';
                echo '<td>'.$row[3].'</td>';
                echo '<td>'.$row[4].'</td>';
                echo '<td class="text-center"><a class="btn btn-success btn-xs" onclick="detailUser('.$row[0].')" href="#"><span class="glyphicon glyphicon-info-sign"></span> Detail</a>&nbsp'
                        . '<a class="btn btn-success btn-xs" onclick="assignActivity('.$row[0].')" href="#"><span class="glyphicon glyphicon-info-sign"></span> Activity Plan List</a>&nbsp'
                        . '<a class="btn btn-primary btn-xs" onclick="assigned('.$row[0].','.$myId.')" href="#"><span class="glyphicon glyphicon-pencil"></span> Assign Activity Plan</a></td>';
                echo '</tr>';
            }
            
        ?>
    </tbody>
</table>
<?php 
require_once '../Assign/newActivityPlan.php';
require_once '../Assign/activityPlanList.php';
require_once 'studentDetail.php';
require_once 'graph.php';
require_once '../footer.php';?>

