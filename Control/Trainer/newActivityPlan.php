<?php

//require_once '../CommonFunction.php';
//require_once '../../Model/trainer.php';
//require_once '../../Model/activityPlanDa.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/trainer.php';
require_once '../../Model/activityPlanDa.php';

$activityPlanName = $_POST['activityPlanName'];
//<a href="activityPlanList.php"></a>
$path = "activityPlanList.php";
$message = "";
$cf = new commonFunction();
if (empty($activityPlanName)) {
    $message .= "Please enter the Activity Plan Name.";
}
if (!empty($activityPlanName)) {
    session_start();
    $trainerId = $_SESSION['trainerDetail']->id;
    $activityPlanDa = new activityPlanDa();
    $result = $activityPlanDa->registerNewActivityPlan($activityPlanName, $trainerId);
    if ($result == 1) {
        $message = $activityPlanName . " is created.";
    } else {
        $message = "please contact IT staff for helping.";
    }
}
$cf->messageAndRedict($message, $path);
