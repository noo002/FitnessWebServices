<?php

require_once './CommonFunction.php';
require_once '../Model/activityPlanDa.php';

$activityPlanId = $_POST['activityPlanId'];
$status = $_POST['status'];

session_start();
$traineeId = $_SESSION['traineeId'];
$activityPlanDa = new activityPlanDa();
$checkExisted = $activityPlanDa->checkAssignedPlan($traineeId);
if ($status == "true") {
    if ($checkExisted == 1) {
        $result = $activityPlanDa->updateAssignPlan($activityPlanId, $traineeId);
        if ($result > 0) {
            $message = "The plan was changed.";
        } else {
            $message = "Please contact IT staff for internal error.";
        }
    } else {
        $result = $activityPlanDa->registerNewAssignPlan($activityPlanId, $traineeId);
        if ($result > 0) {
            $message = "Register successfully.";
        } else {
            $message = "Please contact IT staff for internal error.";
        }
    }
} else {
    $message = "Please select the status before you change the plan for the trainee";
}
echo $message;
