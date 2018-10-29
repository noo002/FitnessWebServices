<?php

require_once 'CommonFunction.php';
require_once '../Model/managementLoginLogDa.php';
require_once '../Model/managementLoginLog.php';


$cf = new commonFunction();
$path = "../View/Web/Management/security.php";
$loginLogDa = new managementLoginLogDa();
session_start();
$email = $_SESSION['managementEmail'];
$loginLog = $loginLogDa->getManagementLoginLog($email);
$_SESSION['loginLog'] = $loginLog;
$_SESSION['lastLoginDate'] = $loginLogDa->getLastSuccessfulLogin($email);

$unsuccessfulLog = $loginLogDa->getLastUnsuccessfulLog($email);
if (!empty($unsuccessfulLog)) {
    $_SESSION['unsuccessfulLog'] = $unsuccessfulLog;
    $_SESSION['lastUnsuccessfulDate'] = $loginLogDa->getLastUnsuccessfulDate($email);
}


$cf->redicrect($path);

//session_start();
//echo $_SESSION['count'];
////session_destroy();