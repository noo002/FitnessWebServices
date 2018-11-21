<?php

require_once '../CommonFunction.php';
require_once '../../Model/activityPlanDa.php';
require_once '../../Model/foodDa.php';


require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../../Control/Trainer/facadeTrainerTracking.php';


$foodId = $_POST['foodId'];
$status = $_POST['status'];
session_start();
$activityPlanId = $_SESSION['activityPlanId'];
$cf = new commonFunction();
$activityPlanDa = new activityPlanDa();
$foodDa = new foodDa();
$foodName = $foodDa->getFoodName($foodId);

$checkExisted = $activityPlanDa->checkDietPlanDetail($activityPlanId, $foodId);
if ($status == "true") {
    if ($checkExisted == false) {
        $activityPlanDa->registerNewDietPlanDetail($activityPlanId, $foodId);
        $trainerId = $_SESSION['trainerDetail']->id;
        $trainerTrackLog = new trainerTrackLog($trainerId, 4);
        $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
        $facadeTrainer->processTrackLog();
        echo $foodName . " is registered to this Activity Plan.";
    } else {
        echo "$foodName already included in this Activity Plan";
    }
} else if ($status == "false") {
    if ($checkExisted == false) {
        echo $foodName . " is not existed in this Activity Plan.";
    } else {
        $activityPlanDa->deleteDietPlanDetail($activityPlanId, $foodId);
        $trainerId = $_SESSION['trainerDetail']->id;
        $trainerTrackLog = new trainerTrackLog($trainerId, 11);
        $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
        $facadeTrainer->processTrackLog();
        echo $foodName . " have been removed from this Activity Plan.";
    }
}


