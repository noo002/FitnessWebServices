<?php
    require_once '../Connection.php';
    $text = $_POST['txt'];
    $text.='%';
    
    $query = $con->prepare('SELECT no,name,calories,image FROM food WHERE name LIKE ? ORDER BY name ASC');
    $query->bind_param('s',$text);
    if(!$query->execute()) echo "fail";
    
    $response = array();
    $result = $query->get_result();
    while($row = $result->fetch_Array()) {
        array_push($response, array(
            'no' =>$row[0],
            'name' =>$row[1],
            'cal' =>$row[2],
            'image' =>$row[3],
        ));
    }
    echo json_encode($response);
    $con->close();
?>
