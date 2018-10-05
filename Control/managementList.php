<?php

require_once '../Model/managementLoginDa.php';
require_once './CommonFunction.php';
require_once '../Model/Management.php';

$managementDa = new managementLoginDa(); // noted that it is managementloginDa due to i spell wrongly

$management = $managementDa->getAllManagement();

session_start();
$_SESSION['managementList'] = $management;


$cf = new commonFunction();

$path = "../View/Web/Management/managementList.php";

$cf->redicrect($path);