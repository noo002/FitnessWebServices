<?php

//
//require_once '../Model/managementLoginDa.php';
//require_once './CommonFunction.php';
//require_once '../Model/activity.php';
//require_once '../Model/activityDa.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/activity.php';
require_once '../../Model/managementLoginDa.php';
require_once '../../Model/activityDa.php';

$cf = new commonFunction();

$activityDa = new activityDa();

$activity = $activityDa->getAllActivity();

session_start();

$_SESSION['activityList'] = $activity;
//<a href="../../View/Management/ActivityList.php"></a>
$path = "../../View/Management/ActivityList.php";

$cf->redicrect($path);
