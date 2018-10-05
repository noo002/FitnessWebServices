<?php
    require_once '../Connection.php';
    $id = 41;
    $response = array();
    
    $query = $con->prepare('SELECT plan_no ,activityplan.name FROM activityassigned '
            . 'INNER JOIN activityplan ON plan_no = activityplan.no WHERE user_id = ? ORDER BY activityplan.name ASC');
    $query->bind_param('i',$id);
    if(!$query->execute()) echo $query->error;
    $result = $query->get_result();
    while($row = $result->fetch_Array()) { 
        
        
        $workoutDetail = array();
        $query = $con->prepare('SELECT activityNo , time FROM activityplandetail WHERE no = ?');
        $query->bind_param('i',$row[0]);
        if(!$query->execute()) echo $query->error;
        $resultDetail = $query->get_result();
        while($rowDetail = $resultDetail->fetch_Array()) { 
            array_push($workoutDetail,array(
                'no' => $rowDetail[0],
                'time' => $rowDetail[1],
            ));
        }
        array_push($response,array(
            'no' => $row[0],
            'name' => $row[1],
            'workout'=>$workoutDetail,
   
        ));
    }
        
    
    
    echo json_encode($response);
    
    $con->close();
?>

