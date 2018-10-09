<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'CommonFunction.php';
require_once '../Model/trainer.php';
require_once '../Model/trainerDa.php';

$cf = new commonFunction();
$path = "../View/Web/Management/trainerList.php";
$trainerDa = new trainerDa();
$trainerList = $trainerDa->getAllTrainer();
session_start();
$_SESSION['trainerList'] = $trainerList;
$cf->redicrect($path);
