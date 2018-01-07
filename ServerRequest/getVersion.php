<?php
    require_once '../Connection.php';
    $response = array();
    //procedure
    $query = $con->prepare("call fetchVersion(@ver)");
    if(!$query->execute()) echo $query->error;
    $result = $con->query("SELECT @ver")->fetch_assoc();
    array_push($response, array('ver' => $result["@ver"]));
    
    //not procedure
    /*$query = $con->prepare("SELECT version FROM version WHERE created_at IN (SELECT MAX(created_at)FROM version)");
    if(!$query->execute()) echo $query->error;
    $result = $query->get_result()->fetch_assoc();
    array_push($response, array('ver' => $result["version"]));*/
    
    echo json_encode($response);
    
    $con->close();
?>

