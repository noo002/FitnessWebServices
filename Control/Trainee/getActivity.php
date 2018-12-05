<?php

require_once '../../Model/activity.php';
require_once '../../Model/activityDa.php';

$da = new activityDa();
$result = $da->getAllActiveActivity();
echo json_encode($result);
