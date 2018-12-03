<?php

require_once '../CommonFunction.php';
require_once '../../Model/activityPlanDa.php';
require_once '../../Model/foodDa.php';


require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../../Control/Trainer/facadeTrainerTracking.php';


$foodId = $_POST['foodId'];
session_start();
$activityPlanId = $_SESSION['activityPlanId'];
$cf = new commonFunction();
$activityPlanDa = new activityPlanDa();


$checkExisted = $activityPlanDa->checkDietPlanDetail($activityPlanId, $foodId);

//Not existed in database
if ($checkExisted == 0) {
    $result = $activityPlanDa->registerNewDietPlanDetail($activityPlanId, $foodId);
    echo 1;
}
//existed in database
else if ($checkExisted == 1) {
    $result = $activityPlanDa->deleteDietPlanDetail($activityPlanId, $foodId);
    echo 2;
}
//someting happen error due to not in existed and existed
else {
    echo "Contact IT staff For Internal help";
}
