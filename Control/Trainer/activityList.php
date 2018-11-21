<?php

/*
  require_once '../Model/managementLoginDa.php';
  require_once './CommonFunction.php';
  require_once '../Model/activity.php';
  require_once '../Model/activityDa.php';
 */

require_once '../CommonFunction.php';
require_once '../../Model/activity.php';
require_once '../../Model/activityDa.php';


require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../../Control/Trainer/facadeTrainerTracking.php';

$cf = new commonFunction();

$activityDa = new activityDa();

$activity = $activityDa->getAllActiveActivity();

session_start();

$_SESSION['activityList'] = $activity;

$path = "../../View/Web/Trainer/activityList.php";


$trainerId = $_SESSION['trainerDetail']->id;
$trainerTrackLog = new trainerTrackLog($trainerId, 7);
$facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
$facadeTrainer->processTrackLog();


$cf->redicrect($path);
