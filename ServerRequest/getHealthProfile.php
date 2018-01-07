<?php
	require_once '../Connection.php';
	$id = $_POST["id"];
	$query = "SELECT no,type,rate,created_at FROM HealthProfile WHERE user_id = $id";
	$result = array();
        $statement = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($statement)) {
	
		array_push($result,array(
		
		'no' =>$row[0],
		'type' =>$row[1],
		'rate' =>$row[2],
		'date' =>$row[3],
	));
	}

	echo json_encode($result);
	$con->close();
?>