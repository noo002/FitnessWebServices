<?php
	require_once '../Connection.php';
	$id = $_POST['id'];
	$date =  $_POST['date'];
	
	$query = $con->prepare("SELECT DietData.no , type ,qty ,Food.calories*qty,Food.name , Food.image,Food.no FROM DietData INNER JOIN Food ON DietData.food_no=Food.no AND DATE_FORMAT(DietData.created_at, '%Y-%m-%d') = ? AND user_id =? ORDER BY Food.name ASC");
	$query->bind_param('si',$date,$id);
        if(!$query->execute()) {
                echo "fail";
        }
        $response = array();
        $result = $query->get_result();
        while($row = $result->fetch_Array()) {
            array_push($response, array(
                'no' =>$row[0],
		'type' =>$row[1],
		'qty' =>$row[2],
		'calories' =>$row[3],
		'name' =>$row[4],
		'image' =>$row[5],
                'foodNo' =>$row[6],
            ));
        }
	echo json_encode($response);
	$con->close();
?>

