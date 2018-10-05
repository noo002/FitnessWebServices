<?php
        require_once '../../Connection.php';
    $id = 7;

    
    $query = $con->prepare("SELECT DATE_FORMAT(activitydata.created_at, '%M %d %Y') AS date ,SUM(duration*(calories/60)) AS burn FROM activitydata INNER JOIN activity ON activity.no = activityNo AND userId= ? GROUP BY date ORDER BY date DESC LIMIT 1");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $activtiyBrun = $result["burn"];
            
            echo $activtiyBrun;
            
    
    $con->close();
?>

