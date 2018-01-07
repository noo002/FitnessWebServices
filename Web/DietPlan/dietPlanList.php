<script src="../js/dietPlan.js" type="text/javascript"></script>
<a href="#" onclick="newPlan()"><h3><span class="glyphicon glyphicon-plus"></span>Insert New Diet Plan</h3></a>
<table id="dietTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Total Calories (Cal)</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $query = $con->prepare("SELECT no ,name FROM dietplan WHERE trainer_id = ? ORDER BY name ASC");
            $query->bind_param('i',$myId);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            while($row = $result->fetch_Array()) { 
                $no = $row[0];
                $name = $row[1];
                $totalCal=0;
                $query = $con->prepare("SELECT foodNo , type , qty FROM dietplandetail where no =?");
                $query->bind_param('i',$no);
                if(!$query->execute()) echo $query->error;
                $result2 = $query->get_result();
                while($row = $result2->fetch_Array()) { 
                    $query = $con->prepare("SELECT calories FROM food WHERE no =?");
                    $query->bind_param('i',$row[0]);
                    if(!$query->execute()) echo $query->error;
                    $resultCal = $query->get_result()->fetch_assoc();
                    $totalCal = $totalCal+($resultCal['calories']*$row[2]);
                }
                echo '<tr>';
                echo '<td>'.$name.'</td>';
                echo '<td>'.$totalCal.'</td>';
                echo '<td class="text-center">'
            . '<a class="btn btn-primary btn-xs" onclick="planDetail('.$no.')" href="#"><span class="glyphicon glyphicon-info-sign"></span> Detail</a> &nbsp'
            . '<a class="btn btn-success btn-xs" onclick="editPlan('.$no.')" href="#"><span class="glyphicon glyphicon-pencil"></span> Edit</a> &nbsp'
                    . '<a class="btn btn-danger btn-xs" onclick="deletePlan('.$no.')" href="#"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>';
            echo '</tr>'; 
                echo '</tr>';
            }
        ?>
    </tbody>
</table>

<?php require_once '../footer.php';  ?>