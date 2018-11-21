<?php

require_once '../CommonFunction.php';
require_once '../../Model/activityPlanDa.php';
require_once '../../Model/activityDa.php';

require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../../Control/Trainer/facadeTrainerTracking.php';

if (isset($_POST['activityId'])) {
    $activityId = $_POST['activityId'];
    $status = $_POST['status'];
    session_start();
    $activityPlanId = $_SESSION['activityPlanId'];
    $activityPlanDa = new activityPlanDa();
    $activityDa = new activityDa();
    $activityName = $activityDa->getActivityName($activityId);
    if ($status == "true") {
        $result = $activityPlanDa->checkActivityInPlanDetail($activityId, $activityPlanId);
        if ($result == true) {
            echo "Already included in this Activity Plan.";
        } else if ($result == false) {
            $activityPlanDa->registerActivityPlanDetail($activityId, $activityPlanId);
            $trainerId = $_SESSION['trainerDetail']->id;
            $trainerTrackLog = new trainerTrackLog($trainerId, 3);
            $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
            $facadeTrainer->processTrackLog();
            $message = $activityName . " is registered to this Activity Plan";
            echo $message;
        }
    } else if ($status == "false") {
        $result = $activityPlanDa->checkActivityInPlanDetail($activityId, $activityPlanId);
        if ($result == true) {
            $activityPlanDa->deleteActivityPlanDetail($activityId, $activityPlanId);
            $trainerId = $_SESSION['trainerDetail']->id;
            $trainerTrackLog = new trainerTrackLog($trainerId, 10);
            $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
            $facadeTrainer->processTrackLog();
            echo $activityName . " is removed from this Activity Plan.";
        } else if ($result == false) {
            echo "This Acitivity already not exist in this Activity Plan.";
        }
    }
}
if (isset($_POST['foodId'])) {
    echo "123";
}





