<?php

require_once '../../Model/activityPlanDa.php';

$traineeId = $_POST['traineeId'];

$da = new activityPlanDa();
$result = $da->getAssignedActivity($traineeId);
echo json_encode($result);
