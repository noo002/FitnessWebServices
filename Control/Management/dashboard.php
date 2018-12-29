<?php

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/activity.php';
require_once '../../Model/activityDa.php';
require_once '../../Model/food.php';
require_once '../../Model/foodDa.php';
require_once '../../Model/Management.php';
require_once '../../Model/managementLoginDa.php';
require_once '../../Model/trainer.php';
require_once '../../Model/trainerDa.php';
require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';

// Get total Activity
$activityDa = new activityDa();
$totalActivity = $activityDa->getTotalActivityCount();
//echo "Total Activity : " . $totalActivity . "<br/>";

//Total Food
$foodDa = new foodDa();
$totalFood = $foodDa->getTotalFoodCount();
//echo "Total Food : " . $totalFood . "<br/>";


//Total Management
$managementDa = new managementLoginDa();
$totalManagement = $managementDa->getTotalManagement();
//echo "Total Management : " . $totalManagement . "<br/>";

//Total Trainer
$trainerDa = new trainerDa();
$totalTrainer = $trainerDa->getTotalTrainer();
//echo "Total Trainer : " . $totalTrainer . "<br/>";

//Total Trainee
$traineeDa = new traineeDa();
$totalTrainee = $traineeDa->getTotalTrainee();
//echo "Total Trainee : " . $totalTrainee . "<br/>";

$result = array(
    "totalActivity" => $totalActivity,
    "totalFood" => $totalFood,
    "totalManagement" => $totalManagement,
    "totalTrainer" => $totalTrainer,
    "totalTrainee" => $totalTrainee
);

session_start();
$_SESSION['totalNumber'] = $result;
//<a href="../../View/Management/Dashboard.php"></a>
$path = "../../View/Management/Dashboard.php";
$cf = new commonFunction();
$cf->redicrect($path);
