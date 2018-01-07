<?php
    require_once '../Connection.php';
    
    $response = array();
    $email = $_POST["email"];
    $pass = $_POST["pass"];
    
    $call =$con->prepare('SELECT active FROM User WHERE email = ? AND password =?');
    $call->bind_param('ss',$email,$pass);
    $call->execute();
    $select = $call->get_result();
	$result = $select->fetch_assoc();
	$array = array();
	if($result["active"]==null){
	    $array['active'] =0;
	}
	else{
	    $array['active'] = $result["active"];
	}
	array_push($response, $array);
    $json = json_encode($response);
    echo $json;
    $con->close();
?>