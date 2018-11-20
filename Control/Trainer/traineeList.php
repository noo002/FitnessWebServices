<?php

/*
require_once 'CommonFunction.php';
require_once '../Model/traineeDa.php';
require_once '../Model/trainee.php';
 *  */
require_once '../CommonFunction.php';
require_once '../../Model/traineeDa.php';
require_once '../../Model/trainee.php';

session_start();
$traineeDa = new traineeDa();
$AllTrainee = $traineeDa->getAllTrainee();
$_SESSION['allTrainee'] = $AllTrainee;
$path = "../../View/Web/Trainer/studentList.php";
$cf = new commonFunction();
$cf->redicrect($path);
