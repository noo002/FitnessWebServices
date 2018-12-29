<?php

//require_once '../../Model/activityPlan.php';
//require_once '../../Model/activityPlanDa.php';
//require_once '../CommonFunction.php';
//require_once '../../Model/trainer.php';


require_once '../../Model/activityPlan.php';
require_once '../../Model/activityPlanDa.php';
require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/trainer.php';

$activityPlanDa = new activityPlanDa();
session_start();
$activityPlanList = $activityPlanDa->getActivityPlanActivity($_SESSION['trainerDetail']->id);

$_SESSION['activityPlanList'] = $activityPlanList;

$cf = new commonFunction();
//<a href="../../View/Trainer/activityPlanList.php"></a>
$path = "../../View/Trainer/activityPlanList.php";
$cf->redicrect($path);
