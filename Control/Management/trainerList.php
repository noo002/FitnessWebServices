<?php

//require_once 'CommonFunction.php';
//require_once '../Model/trainer.php';
//require_once '../Model/trainerDa.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/trainer.php';
require_once '../../Model/trainerDa.php';

$cf = new commonFunction();
//$path = "../View/Web/Management/trainerList.php";
//<a href="../../View/Management/TrainerList.php"></a>
$path = "../../View/Management/TrainerList.php";
$trainerDa = new trainerDa();
$trainerList = $trainerDa->getAllTrainer();
session_start();
$_SESSION['trainerList'] = $trainerList;
$cf->redicrect($path);
