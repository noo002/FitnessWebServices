<?php

require_once '../../Model/activityLog.php';
require_once '../../Model/activityLogDa.php';

$type = $_POST['type'];
$duration = $_POST['duration'];
$distance = $_POST['distance'];
$traineeId = $_POST['traineeId'];
$activityId = $_POST['activityId'];

$da = new activityLogDa();
$result = $da->registerNewActivityLog($type, $duration, $distance, $traineeId, $activityId);
echo json_encode($result);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

