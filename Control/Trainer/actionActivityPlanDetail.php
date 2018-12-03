<?php

require_once '../CommonFunction.php';
require_once '../../Model/activityPlanDa.php';
require_once '../../Model/activityDa.php';

require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../../Control/Trainer/facadeTrainerTracking.php';

$activityId = $_POST['activityId'];
$cf = new commonFunction();
session_start();
$activityPlanId = $_SESSION['activityPlanId'];

$activityPlanDa = new activityPlanDa();

$checkExisted = $activityPlanDa->checkActivityInPlanDetail($activityId, $activityPlanId);

//Not existed in the plan
if ($checkExisted == 0) {
    $result = $activityPlanDa->registerActivityPlanDetail($activityId, $activityPlanId);
    $trainerId = $_SESSION['trainerDetail']->id;
    $trainerTrackLog = new trainerTrackLog($trainerId, 3);
    $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
    $facadeTrainer->processTrackLog();
    $code = 1;
    echo json_encode($code);
}
//This activity is in this activityPlan 
else if ($checkExisted == 1) {
    $result = $activityPlanDa->deleteActivityPlanDetail($activityId, $activityPlanId);
    $trainerId = $_SESSION['trainerDetail']->id;
    $trainerTrackLog = new trainerTrackLog($trainerId, 10);
    $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
    $facadeTrainer->processTrackLog();
    $code = 2;
    echo json_encode($code);
}
//This might be error 
else {
    $code = 3;
    echo json_encode($code);
}





