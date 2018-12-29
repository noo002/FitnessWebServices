<?php

//require_once '../CommonFunction.php';
//require_once '../../Model/standardGoal.php';
//require_once '../../Model/standardGoalDa.php';

//require_once '../../Model/trainer.php';
//require_once '../../Model/trainerTrackLogDa.php';
//require_once '../../Model/trainerTrackLog.php';
//require_once '../../Control/Trainer/facadeTrainerTracking.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/standardGoal.php';
require_once '../../Model/standardGoalDa.php';

require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../facadeDesignPattern/facadeTrainerTracking.php';


$cf = new commonFunction();
$path = "goalList.php";

$goalName = $_POST['goalName'];
$foodIntake = $_POST['foodIntake'];
$activityDuration = $_POST['activityDuration'];



$message = "";
$cf = new commonFunction();
$path = "goalList.php";
$error = false;
if (empty($goalName)) {
    $message .= 'Goal Name cannot be blank\n';
    $error = true;
}
if (empty($foodIntake)) {
    $message .= 'Food Intake cannot be blank\n';
    $error = true;
}
if (empty($activityDuration)) {
    $message .= 'Activity Duration cannot be blank\n';
    $error = true;
}
if ($foodIntake < 1000 || $foodIntake > 5000) {
    $message .= 'Food Intake calories burn cannot be less than 1000 or more than 5000\n';
    $error = true;
}
if (!is_numeric($foodIntake)) {
    $message .= 'Please enter food intake as number\n';
    $error = true;
}
if ($activityDuration < 20 || $activityDuration > 240) {
    $message .= 'Activity Duration must between at least 20 minutes or less than 240 minutes\n';
    $error = true;
}
if (!is_numeric($activityDuration)) {
    $message .= "Activity Duration must be number";
    $error = true;
}
if (!$error) {
    session_start();
    $standardGoal = new standardGoal($goalName, "", $foodIntake, $activityDuration);
    $standardGoal->setStandardGoalId($_SESSION['standardGoalDetail']->standardGoalId);
    $da = new standardGoalDa();
    $result = $da->updateStandardGoal($standardGoal);
    if ($result > 0) {
        $trainerId = $_SESSION['trainerDetail']->id;
        $trainerTrackLog = new trainerTrackLog($trainerId, 9);
        $facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
        $facadeTrainer->processTrackLog();
        $message = $goalName . " is updated!";
    } else {
        $message = "Problem occur please contact IT for checking";
    }
    unset($_SESSION['standardGoalDetail']);
}
$cf->messageAndRedict($message, $path);
