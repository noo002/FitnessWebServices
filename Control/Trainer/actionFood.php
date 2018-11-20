<?php

require_once '../CommonFunction.php';
require_once '../../Model/food.php';
require_once '../../Model/foodDa.php';
$foodId = $_POST['edit'];
$path = "../../View/Web/Trainer/editFood.php";
$cf = new commonFunction();
$foodDa = new foodDa();
$food = $foodDa->getFoodDetail($foodId);
session_start();
$_SESSION['foodDetail'] = $food;
$cf->redicrect($path);

