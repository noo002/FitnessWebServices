<?php

require_once '../../Model/goal.php';
require_once '../../Model/goalDa.php';

//$traineeId,$type,$description,$standardGoalId,$measurement
$traineeId = $_POST['traineeId'];
$type = $_POST['type'];
$description = $_POST['description'];
$standardGoalId = $_POST['standardGoalId'];
$measurement = $_POST['measurement'];

$da = new goalDa();
$result = $da->registerNewGoal($traineeId, $type, $description, $standardGoalId, $measurement);
echo json_encode($result);
