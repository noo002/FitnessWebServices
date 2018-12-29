<?php

require_once '../../Model/goal.php';
require_once '../../Model/goalDa.php';

$traineeId = $_POST['traineeId'];
$da = new goalDa();
$result = $da->getGoal($traineeId);
echo json_encode($result);