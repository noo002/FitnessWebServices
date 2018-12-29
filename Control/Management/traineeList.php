<?php

//require_once 'CommonFunction.php';
//require_once '../Model/traineeDa.php';
//require_once '../Model/trainee.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/traineeDa.php';
require_once '../../Model/trainee.php';


session_start();
$traineeDa = new traineeDa();
$AllTrainee = $traineeDa->getTrainee();
$_SESSION['allTrainee'] = $AllTrainee;

//<a href="../../View/Management/TraineeList.php"></a>
$path = "../../View/Management/TraineeList.php";
$cf = new commonFunction();
$cf->redicrect($path);
