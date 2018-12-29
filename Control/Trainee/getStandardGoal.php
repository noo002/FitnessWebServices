<?php

require_once '../../Model/standardGoal.php';
require_once '../../Model/standardGoalDa.php';

$da = new standardGoalDa();

$result = $da->getAllStandardGoal();

echo json_encode($result);
   
