<?php
	require_once '../Connection.php';
	$id = $_POST["id"];
	$query = "SELECT no,duration,heartRate,created_at,activityNo FROM ActivityData WHERE userId = $id";
	
	$result = array();
    $statement = mysqli_query($con, $query);
	while($row = mysqli_fetch_array($statement)) {
	
		array_push($result,array(
		
		'no' =>$row[0],
		'duration' =>$row[1],
		'hr' =>$row[2],
		'date' =>$row[3],
		'activityNo' =>$row[4],
	));
	}

	echo json_encode($result);
	$con->close();
?>