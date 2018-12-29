<?php

require_once '../../Model/traineeDa.php';
require_once '../../Model/activityPlanDa.php';
require_once '../../Model/goalDa.php';
require_once '../CommonFunction/CommonFunction.php';

//<a href="../../View/Trainer/Dashboard.php"></a>
$path = "../../View/Trainer/Dashboard.php";

// get total number of trainee
$traineeDa = new traineeDa();
$totalTrainee = $traineeDa->getTotalTrainee();
//echo "Total Trainee : " . $totalTrainee . "<br/>";

//get total number of activityPlan 
$activityPlanDa = new activityPlanDa();
$totalActivityPlan = $activityPlanDa->getTotalActivityPlan();
//echo "Total Activity Plan : " . $totalActivityPlan . "<br/>";

//get total number of standard goal
// noted accidentally wrote inside the goal... paiseh
$goalDa = new goalDa();
$totalGoal = $goalDa->getTotalStandardGoal();
//echo "Total Standard Goal : " . $totalGoal . "<br/>";

$result = array(
    "totalTrainee" => $totalTrainee,
    "totalActivityPlan" => $totalActivityPlan,
    'totalStandardGoal' => $totalGoal
);
session_start();
$_SESSION['totalNumber'] = $result;
$cf = new commonFunction();
$cf->redicrect($path);
