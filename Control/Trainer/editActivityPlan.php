<?php

//require_once '../CommonFunction.php';
//require_once '../../Model/activityPlanDa.php';
//
//require_once '../../Model/trainer.php';
//require_once '../../Model/trainerTrackLogDa.php';
//require_once '../../Model/trainerTrackLog.php';
//require_once '../../Control/Trainer/facadeTrainerTracking.php';


require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/activityPlanDa.php';
require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../facadeDesignPattern/facadeTrainerTracking.php';

$desc = $_POST['activityPlanName'];
$path = "activityPlanList.php";
$message = "";
$cf = new commonFunction();
if (!empty($desc)) {
    echo $desc;
    session_start();
    $activityPlanId = $_SESSION['activityPlanId'];
    $activityPlanDa = new activityPlanDa();
    $result = $activityPlanDa->updateActivityPlanDescription($activityPlanId, $desc);
    if ($result == 1) {
        $trainerId = $_SESSION['trainerDetail']->id;
        $trainerTrackLog = new trainerTrackLog($trainerId, 2);
        $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
        $facadeTrainer->processTrackLog();
        $message = $desc . " is updated.";
    } else {
        $message = "Please contact IT staff due to internal problem";
    }
} else {
    $message = "Activity Name cannot be blank.";
}
$cf->messageAndRedict($message, $path);
