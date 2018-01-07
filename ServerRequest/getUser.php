<?php
    require_once '../Connection.php';
    $response = array();
	$user = new stdClass();
	
	$email = $_POST["email"];
	
	$call =$con->prepare('SELECT id,name,gender,dob,image,height,password FROM User WHERE email = ?');
	$call->bind_param('s',$email);
        $call->execute();
    
        $select = $call->get_result();
	$result = $select->fetch_assoc();
	
	$array = array();
	
	$array['id'] = $result["id"];
	$array['name'] = $result["name"];
	$array['gender'] = $result["gender"];
	$array['dob'] = $result["dob"];
	$array['image'] = $result["image"];
	$array['height'] = $result["height"];
	$array['password'] = $result["password"];
	
    array_push($response, $array);
    $json = json_encode($response);
    echo $json;
    
    $con->close();
?>