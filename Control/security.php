<?php

require_once 'CommonFunction.php';
require_once '../Model/managementLoginLogDa.php';
require_once '../Model/managementLoginLog.php';


$cf = new commonFunction();
$path = "../View/Web/Management/security.php";
$cf->redicrect($path);

//session_start();
//echo $_SESSION['count'];
////session_destroy();