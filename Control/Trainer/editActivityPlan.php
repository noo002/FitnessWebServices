<?php

require_once '../CommonFunction.php';
require_once '../../Model/activityPlanDa.php';

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
        $message = $desc . " is updated.";
    } else {
        $message = "Please contact IT staff due to internal problem";
    }
} else {
    $message = "Activity Name cannot be blank.";
}
$cf->messageAndRedict($message, $path);