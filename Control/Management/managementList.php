<?php

//require_once '../Model/managementLoginDa.php';
//require_once './CommonFunction.php';
//require_once '../Model/Management.php';

require_once '../../Model/managementLoginDa.php';
require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/Management.php';

$managementDa = new managementLoginDa(); // noted that it is managementloginDa due to i spell wrongly

$management = $managementDa->getAllManagement();

session_start();
$_SESSION['managementList'] = $management;


$cf = new commonFunction();
//<a href="../../View/Management/UserList.php"></a>
$path = "../../View/Management/UserList.php";

$cf->redicrect($path);
