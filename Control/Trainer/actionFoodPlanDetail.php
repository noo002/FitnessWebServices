<?php

require_once '../CommonFunction.php';
require_once '../../Model/activityPlanDa.php';
require_once '../../Model/foodDa.php';


require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../../Control/Trainer/facadeTrainerTracking.php';


$foodId = $_POST['foodId'];
$path = "../../View/Web/Trainer/activityPlanListDetail.php";
session_start();
$activityPlanId = $_SESSION['activityPlanId'];
$cf = new commonFunction();
$activityPlanDa = new activityPlanDa();


$checkExisted = $activityPlanDa->checkDietPlanDetail($activityPlanId, $foodId);

//Not existed in database
if ($checkExisted == 0) {
    $result = $activityPlanDa->registerNewDietPlanDetail($activityPlanId, $foodId);

    $foodListDetail = $activityPlanDa->getActivityPlanFoodList($_SESSION['trainerDetail']->id, $activityPlanId);
    $_SESSION['foodListDetail'] = $foodListDetail;
    $totalCalories = 0;
    foreach ($foodListDetail as $row => $key) {
        if ($key['status'] == 1) {
            $totalCalories = $totalCalories + $key['calories'];
        }
    }
    $_SESSION['totalCalories'] = $totalCalories;
    $message = "This food has been assigned to the plan";
    $trainerTrackLog = new trainerTrackLog($trainerId, 4);
    $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
    $facadeTrainer->processTrackLog();
    $activityPlanDa = new activityPlanDa();
}
//existed in database
else if ($checkExisted == 1) {
    $result = $activityPlanDa->deleteDietPlanDetail($activityPlanId, $foodId);

    $foodListDetail = $activityPlanDa->getActivityPlanFoodList($_SESSION['trainerDetail']->id, $activityPlanId);
    $_SESSION['foodListDetail'] = $foodListDetail;
    $totalCalories = 0;
    foreach ($foodListDetail as $row => $key) {
        if ($key['status'] == 1) {
            $totalCalories = $totalCalories + $key['calories'];
        }
    }
    $_SESSION['totalCalories'] = $totalCalories;
    $message = "This food has been removed from the plan";
    $trainerTrackLog = new trainerTrackLog($trainerId, 11);
    $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
    $facadeTrainer->processTrackLog();
    $activityPlanDa = new activityPlanDa();
}
//someting happen error due to not in existed and existed
else {
    $message = "Contact IT staff For Internal help";
}
$cf->messageAndRedict($message, $path);
