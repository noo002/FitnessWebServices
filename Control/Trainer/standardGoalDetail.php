<?php

//require_once '../CommonFunction.php';
//require_once '../../Model/standardGoal.php';
//require_once '../../Model/standardGoalDa.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/standardGoal.php';
require_once '../../Model/standardGoalDa.php';

$standardGoalId = $_POST['edit'];
$standardGoalDa = new standardGoalDa();
$standardGoal = $standardGoalDa->getStandardGoalDetail($standardGoalId);
session_start();
$_SESSION['standardGoalDetail'] = $standardGoal;
//<a href="../../View/Trainer/editStandardGoal.php"></a>
$path = "../../View/Trainer/editStandardGoal.php";
$cf = new commonFunction();
$cf->redicrect($path);


