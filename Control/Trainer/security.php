<?php

//require_once 'CommonFunction.php';
//require_once '../Model/managementLoginLogDa.php';
//require_once '../Model/managementLoginLog.php';
//require_once '../CommonFunction.php';
//require_once '../../Model/trainerDa.php';
//require_once '../../Model/trainerLoginLogDa.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/trainerDa.php';
require_once '../../Model/trainerLoginLogDa.php';

$cf = new commonFunction();
//<a href="../../View/Trainer/security.php"></a>
$path = "../../View/Trainer/security.php";
//$loginLogDa = new managementLoginLogDa();
//session_start();
//$email = $_SESSION['managementEmail'];
//$loginLog = $loginLogDa->getManagementLoginLog($email);
//$_SESSION['loginLog'] = $loginLog;
//$_SESSION['lastLoginDate'] = $loginLogDa->getLastSuccessfulLogin($email);
//
//$unsuccessfulLog = $loginLogDa->getLastUnsuccessfulLog($email);
//if (!empty($unsuccessfulLog)) {
//    $_SESSION['unsuccessfulLog'] = $unsuccessfulLog;
//    $_SESSION['lastUnsuccessfulDate'] = $loginLogDa->getLastUnsuccessfulDate($email);
//}
$trainerLoginLogDa = new trainerLoginLogDa();
session_start();
$trainerId = $_SESSION['trainerDetail']->id;
$loginLog = $trainerLoginLogDa->getLoginLogDetail($trainerId);
$_SESSION['loginLog'] = $loginLog;
$_SESSION['lastLoginDate'] = $trainerLoginLogDa->getLastLoginDate($trainerId);
$unsuccessfulLog = $trainerLoginLogDa->getUnsuccessfulLoginLog($trainerId);
if (!empty($unsuccessfulLog)) {
    $_SESSION['unsuccessfulLog'] = $unsuccessfulLog;
    $_SESSION['lastUnsuccessfulDate'] = $trainerLoginLogDa->getLastUnsuccessfulLoginDate($trainerId);
}

$cf->redicrect($path);
