<?php

require_once '../../Model/standardGoal.php';
require_once '../../Model/standardGoalDa.php';
require_once '../CommonFunction.php';

$standardGoalDa = new standardGoalDa();
$standardGoalList = $standardGoalDa->getAllStandardGoal();
$cf = new commonFunction();
$path = "../../View/Web/Trainer/createGoal.php";
session_start();
$_SESSION['standardGoal'] = $standardGoalList;
$cf->redicrect($path);
