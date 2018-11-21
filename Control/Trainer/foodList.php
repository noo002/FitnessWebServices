<?php

/* require_once 'CommonFunction.php';
  require_once '../Model/food.php';
  require_once '../Model/foodDa.php'; */
require_once '../CommonFunction.php';
require_once '../../Model/food.php';
require_once '../../Model/foodDa.php';

require_once '../../Model/trainer.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../../Control/Trainer/facadeTrainerTracking.php';

$foodDa = new foodDa();
$food = $foodDa->getAllActiveFood();
$path = "../../View/Web/Trainer/foodList.php";
session_start();

$_SESSION['foodList'] = $food;


$trainerId = $_SESSION['trainerDetail']->id;
$trainerTrackLog = new trainerTrackLog($trainerId, 6);
$facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
$facadeTrainer->processTrackLog();

$cf = new commonFunction();

$cf->redicrect($path);
