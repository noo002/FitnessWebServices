<?php

require_once '../CommonFunction.php';
require_once '../../Model/activity.php';
require_once '../../Model/activityDa.php';
require_once '../../Model/food.php';
require_once '../../Model/foodDa.php';
require_once '../../Model/activityPlanDa.php';
require_once '../../Model/trainer.php';
require_once '../../Model/feedback.php';
require_once '../../Model/feedbackDa.php';

$cf = new commonFunction();

if (isset($_POST['detail'])) {
    $activityPlanId = $_POST['detail'];
    $path = "../../View/Web/Trainer/activityPlanListDetail.php";
    session_start();
    $activityPlanDa = new activityPlanDa();
    $activityPlanListDetail = $activityPlanDa->getAllActivityInList($_SESSION['trainerDetail']->id, $activityPlanId);
    $description = $activityPlanDa->getActivityPlanDescription($activityPlanId, $_SESSION['trainerDetail']->id);
    $_SESSION['activityPlanDescription'] = $description;
    $_SESSION['activityPlanId'] = $activityPlanId;
    $_SESSION['activityPlanListDetail'] = $activityPlanListDetail;

    //here is food places
    $foodListDetail = $activityPlanDa->getActivityPlanFoodList($_SESSION['trainerDetail']->id, $activityPlanId);
    $_SESSION['foodListDetail'] = $foodListDetail;
} else if (isset($_POST['feedback'])) {
    $path = "../../View/Web/Trainer/feedback.php";
    $activityPlanId = $_POST['feedback'];
    $activityPlanDa = new activityPlanDa();
    session_start();
    $description = $activityPlanDa->getActivityPlanDescription($activityPlanId, $_SESSION['trainerDetail']->id);
    $_SESSION['activityPlanDescription'] = $description;
    $_SESSION['activityPlanId'] = $activityPlanId;
    $feedbackDa = new feedbackDa();
    $feedbackList = $feedbackDa->getAllFeedback($_SESSION['trainerDetail']->id,$activityPlanId);
    $_SESSION['feedbackList'] = $feedbackList;
} else if (isset($_POST['edit'])) {
    $path = "../../View/Web/Trainer/editActivityPlan.php";
    $activityPlanId = $_POST['edit'];
    $activityPlanDa = new activityPlanDa();
    session_start();
    $description = $activityPlanDa->getActivityPlanDescription($activityPlanId, $_SESSION['trainerDetail']->id);
    $_SESSION['activityPlanDescription'] = $description;
    $_SESSION['activityPlanId'] = $activityPlanId;
}
$cf->redicrect($path);
