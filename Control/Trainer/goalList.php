<?php

//require_once '../../Model/standardGoal.php';
//require_once '../../Model/standardGoalDa.php';
//require_once '../CommonFunction.php';

require_once '../../Model/standardGoal.php';
require_once '../../Model/standardGoalDa.php';
require_once '../CommonFunction/CommonFunction.php';


$standardGoalDa = new standardGoalDa();
$standardGoalList = $standardGoalDa->getAllStandardGoal();
$cf = new commonFunction();
//<a href="../../View/Trainer/goalList.php"></a>
$path = "../../View/Trainer/goalList.php";
session_start();
$_SESSION['standardGoal'] = $standardGoalList;
$cf->redicrect($path);
