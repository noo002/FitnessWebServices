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

$cf = new commonFunction();

$activityDa = new activityDa();

$activity = $activityDa->getAllActiveActivity();

session_start();

$_SESSION['activityList'] = $activity;

$path = "../../View/Web/Trainer/activityList.php";

$cf->redicrect($path);