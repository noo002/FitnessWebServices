<?php

//require_once 'CommonFunction.php';
//require_once '../Model/activityDa.php';

require_once '../CommonFunction.php';
require_once '../../Model/activityDa.php';

$activityId = $_POST['edit'];
$cf = new commonFunction();
$activityDa = new activityDa();
$activity = $activityDa->getActivityDetail($activityId);
session_start();
$_SESSION['activityDetail'] = $activity;
$path = "../../View/Web/Trainer/editActivity.php";
$cf->redicrect($path);
