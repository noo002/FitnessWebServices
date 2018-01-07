<?php
    require_once '../Connection.php';
    $email = $_POST['email'];
    $query = $con->prepare("call checkEmail(?,@count)");
    $query->bind_param('s',$email);
    if(!$query->execute()) echo $query->error;
    
    $result = $con->query("SELECT @count")->fetch_assoc();
    
    $response = array();
    array_push($response, array('count' => $result["@count"]));
    
    echo json_encode($response);
    $con->close();
    
?>