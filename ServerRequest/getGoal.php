<?php

    require_once '../Connection.php';
    $id =41;
    $goal = array("weight", "step", "cal");
    $temArry = array();
    $response = array();
    
    for($type =0 ;$type<=2;$type++) {
        $query = $con->prepare("call fetchGoal(?,?,@rate)");
        $query->bind_param('ii',$id,$type);
        if(!$query->execute()) echo $query->error;

        $result = $con->query("SELECT @rate")->fetch_assoc();

        array_push($temArry,array(
            $goal[$type]=>(int)$result["@rate"],
        ));
    }
    
    array_push($response,array(
            $goal[0]=>(int)$temArry[0]['weight'],
            $goal[1]=>(int)$temArry[1]['step'],
            $goal[2]=>(int)$temArry[2]['cal'],
    ));
    
    
    
    echo json_encode($response);
    
    $con->close();
    
    
    
?>

