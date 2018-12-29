<?php

//require_once '../CommonFunction.php';
//require_once '../../Model/activityPlanDa.php';
//require_once '../../Model/activityDa.php';
//require_once '../../Model/trainer.php';
//require_once '../../Model/trainerTrackLogDa.php';
//require_once '../../Model/trainerTrackLog.php';
//require_once '../../Control/Trainer/facadeTrainerTracking.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/activityPlan.php';
require_once '../../Model/activityPlanDa.php';

require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../facadeDesignPattern/facadeTrainerTracking.php';

$activityId = $_POST['activityId'];
$cf = new commonFunction();
session_start();
$activityPlanId = $_SESSION['activityPlanId'];
//<a href="../../View/Trainer/activityPlanListDetail.php"></a>
$path = "../../View/Trainer/activityPlanListDetail.php";
$activityPlanDa = new activityPlanDa();

$checkExisted = $activityPlanDa->checkActivityInPlanDetail($activityId, $activityPlanId);

//Not existed in the plan
if ($checkExisted == 0) {
    $result = $activityPlanDa->registerActivityPlanDetail($activityId, $activityPlanId);
    $trainerId = $_SESSION['trainerDetail']->id;
    $trainerTrackLog = new trainerTrackLog($trainerId, 3);
    $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
    $facadeTrainer->processTrackLog();
    $activityPlanDa = new activityPlanDa();
    $activityPlanListDetail = $activityPlanDa->getAllActivityInList($_SESSION['trainerDetail']->id, $activityPlanId);
    $description = $activityPlanDa->getActivityPlanDescription($activityPlanId, $_SESSION['trainerDetail']->id);

    $total = 0;
    foreach ($activityPlanListDetail as $row => $key) {
        if ($key['status'] == 1) {
            $total = $total + $key['totalCaloriesBurned'];
        }
    }
    $_SESSION['total'] = $total;
    $_SESSION['activityPlanDescription'] = $description;
    $_SESSION['activityPlanId'] = $activityPlanId;
    $_SESSION['activityPlanListDetail'] = $activityPlanListDetail;
    $message = "This Activity is Assigned to the Plan";
}
//This activity is in this activityPlan 
else if ($checkExisted == 1) {
    $result = $activityPlanDa->deleteActivityPlanDetail($activityId, $activityPlanId);
    $trainerId = $_SESSION['trainerDetail']->id;
    $trainerTrackLog = new trainerTrackLog($trainerId, 10);
    $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
    $facadeTrainer->processTrackLog();
    $activityPlanDa = new activityPlanDa();
    $activityPlanListDetail = $activityPlanDa->getAllActivityInList($_SESSION['trainerDetail']->id, $activityPlanId);
    $description = $activityPlanDa->getActivityPlanDescription($activityPlanId, $_SESSION['trainerDetail']->id);

    $total = 0;
    foreach ($activityPlanListDetail as $row => $key) {
        if ($key['status'] == 1) {
            $total = $total + $key['totalCaloriesBurned'];
        }
    }
    $_SESSION['total'] = $total;
    $_SESSION['activityPlanDescription'] = $description;
    $_SESSION['activityPlanId'] = $activityPlanId;
    $_SESSION['activityPlanListDetail'] = $activityPlanListDetail;
    $message = "This Activity is removed from the plan";
}
//This might be error 
else {
    $message = "Please contact Internal staff due to internal problem";
}
$cf->messageAndRedict($message, $path);



