<?php

require_once 'CommonFunction.php';
require_once '../Model/food.php';
require_once '../Model/foodDa.php';

$foodDa = new foodDa();
$food = $foodDa->getAllFood();
$path = "../View/Web/Management/foodList.php";
session_start();

$_SESSION['foodList'] = $food;

$cf = new commonFunction();

$cf->redicrect($path);