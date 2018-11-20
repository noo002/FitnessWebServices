<?php

require_once '../CommonFunction.php';
require_once '../../Model/standardGoal.php';
require_once '../../Model/standardGoalDa.php';

$standardGoalId = $_POST['edit'];
$standardGoalDa = new standardGoalDa();
$standardGoal = $standardGoalDa->getStandardGoalDetail($standardGoalId);
session_start();
$_SESSION['standardGoalDetail'] = $standardGoal;
$path = "../../View/Web/Trainer/editStandardGoal.php";
$cf = new commonFunction();
$cf->redicrect($path);


