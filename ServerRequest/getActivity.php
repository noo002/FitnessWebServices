<?php
    require_once '../Connection.php';
    $response = array();
    $query = $con->prepare("call fetchActiviy()");
    if(!$query->execute()) echo $query->error;
    $result = $query->get_result();
    while($row = $result->fetch_Array()) {
        array_push($response,array(
            'no' => $row[0],
            'name' => $row[1],
            'desc' => $row[2],
            'calories' => $row[3],
            'time' => $row[4],
            'image' => $row[5],
        ));
    }
    echo json_encode($response);
    
    $con->close();
?>

