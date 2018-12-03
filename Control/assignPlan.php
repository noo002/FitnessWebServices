<?php

require_once './CommonFunction.php';
require_once '../Model/activityPlanDa.php';

$activityPlanId = $_POST['activityPlanId'];

session_start();
$traineeId = $_SESSION['traineeId'];
$activityPlanDa = new activityPlanDa();
$checkExisted = $activityPlanDa->checkAssignedPlan($traineeId);
//which mean have in database
if ($checkExisted == 1) {
    $result = $activityPlanDa->updateAssignPlan($activityPlanId, $traineeId);
    $message = "Activity Plan was updated!";
} else {
    $result = $activityPlanDa->registerNewAssignPlan($activityPlanId, $traineeId);
    $message = "New Acitivity Plan was assigned!";
}
$path = "traineeList.php";
$cf = new commonFunction();
$cf->messageAndRedict($message, $path);
