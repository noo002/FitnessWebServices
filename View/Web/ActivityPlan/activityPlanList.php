
<script src="../js/activityPlan.js" type="text/javascript"></script>

<a href="#" onclick="newPlan()"><h3><span class="glyphicon glyphicon-plus"></span>Insert New Activity Plan</h3></a>
<table id="myTable" class="display table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Number of Activity</th>
            <th>Total Calories Burn(Cal)</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        
        
        $query = $con->prepare("SELECT id FROM trainer WHERE email =?");
        $query->bind_param('s',$_SESSION['login']);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result()->fetch_assoc();
        $id = $result['id'];
        
        $query = $con->prepare("SELECT no,name FROM activityplan WHERE trainer_id = ? ORDER BY name ASC");
        $query->bind_param('i',$id);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result();
        while($row = $result->fetch_Array()) { 
            $no = $row[0];
            $name = $row[1];
            $toalCal=0;
            $num =0;
            $query = $con->prepare("SELECT activityNo , time FROM activityplandetail WHERE no =?");
            $query->bind_param('i',$no);
            if(!$query->execute()) echo $query->error;
            $result2 = $query->get_result();
            while($row = $result2->fetch_Array()) {   

                
                $query = $con->prepare("SELECT calories FROM activity WHERE no =?;");
                $query->bind_param('i',$row[0]);
                if(!$query->execute()) echo $query->error;
                $resultCal = $query->get_result()->fetch_assoc();
                $toalCal = $toalCal+($resultCal['calories']*$row[1]);
                $num++;

                
            }
            echo '<tr>';
            echo '<td>'.$name.'</td>';
            echo '<td>'.$num.'</td>';
            echo '<td>'.$toalCal.'</td>';
            echo '<td class="text-center">'
            . '<a class="btn btn-primary btn-xs" onclick="planDetail('.$no.')" href="#"><span class="glyphicon glyphicon-info-sign"></span> Detail</a> &nbsp'
            . '<a class="btn btn-success btn-xs" onclick="editPlan('.$no.')" href="#"><span class="glyphicon glyphicon-pencil"></span> Edit</a> &nbsp'
                    . '<a class="btn btn-danger btn-xs" onclick="deletePlan('.$no.')" href="#"><span class="glyphicon glyphicon-trash"></span> Delete</a></td>';
            echo '</tr>';  
        }
        
        
        ?>
    </tbody>
 
</table>
<?php 
    
    require_once 'activityPlanDetail.php';
    require_once 'editActivityPlan2.php';
    require_once 'newActivityPlan.php';
    //require_once 'editActivityPlan.php';
    
    require_once '../footer.php'; 
?>