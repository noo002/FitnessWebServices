<?php

/*require_once 'CommonFunction.php';
require_once '../Model/food.php';
require_once '../Model/foodDa.php';*/
require_once '../CommonFunction.php';
require_once '../../Model/food.php';
require_once '../../Model/foodDa.php';

$foodDa = new foodDa();
$food = $foodDa->getAllActiveFood();
$path = "../../View/Web/Trainer/foodList.php";
session_start();

$_SESSION['foodList'] = $food;

$cf = new commonFunction();

$cf->redicrect($path);
