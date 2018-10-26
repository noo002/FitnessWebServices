<?php

require_once 'CommonFunction.php';
require_once '../Model/activityDa.php';

$cf = new commonFunction();

if (isset($_POST['edit'])) {
    $activityId = $_POST['edit'];
    $activityDa = new activityDa();
    $activity = $activityDa->getActivityDetail($activityId);
    session_start();
    $_SESSION['activityDetail'] = $activity;
    $path = "../View/Web/Management/editActivity.php";
    $cf->redicrect($path);
}
if (isset($_POST['status'])) {
    $activityId = $_POST['status'];
    $activityDa = new activityDa();
    $result = $activityDa->updateActivityStatus($activityId);
    $path = "activityList.php";
    if ($result > 0) {
        $message = "1 row has been updated";
    } else {
        $message = "problem occur due to update status";
    }
    $cf->messageAndRedict($message, $path);
}
