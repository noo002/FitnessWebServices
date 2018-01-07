<?php
    require_once '../Connection.php';
    $no=$_POST['no'];
    $response = array();
    $query = $con->prepare("call fetchRanking(?)");
    $query->bind_param('i',$no);
    if(!$query->execute()) echo $query->error;
    $result = $query->get_result();
    while($row = $result->fetch_Array()) {
        array_push($response,array(
            'name' => $row[0],
            'cal' => $row[1],
        ));
    }
    echo json_encode($response);
    $con->close();
?>

