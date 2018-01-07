<?php
    require_once '../Connection.php';
    $id = $_POST['id'];
    $response = array();
    $query = $con->prepare('SELECT activity.no , activity.name ,time FROM activity INNER JOIN activityplandetail ON activityplandetail.activityNo = activity.no INNER JOIN activityassigned ON activityassigned.plan_no = activityplandetail.no AND activityassigned.user_id = ? ORDER BY activity.name ASC');
    $query->bind_param('i',$id);
    if(!$query->execute()) echo $query->error;
    
    $result = $query->get_result();
    while($row = $result->fetch_Array()) {
        array_push($response,array(
            'no'=>$row[0],
            'name'=>$row[1],
            'time'=>$row[2],
        ));
    }
    echo json_encode($response);
    
    $con->close();
?>

