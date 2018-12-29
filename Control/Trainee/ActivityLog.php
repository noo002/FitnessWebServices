<?php

require_once '../../Model/activityLogDa.php';
require_once '../../Model/activityLog.php';

$type = $_POST['type'];
$description = $_POST['description'];
$duration = $_POST['duration'];
$distance = $_POST['distance'];
$traineeId = $_POST['trainerId'];

$activityLog = new activityLog($type, $description, $duration, $distance, $traineeId);
$da = new activityLogDa();
$result = $da->registerNewActivityLog($activityLog);
echo json_encode($result);
