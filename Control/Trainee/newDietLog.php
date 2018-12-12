<?php

//private $type, $foodName, $quantity, $calories, $traineeId;

require_once '../../Model/dietLog.php';
require_once '../../Model/dietLogDa.php';

$type = $_POST['type'];
$foodName = $_POST['foodName'];
$quantity = $_POST['quantity'];
$calories = $_POST['calories'];
$traineeId = $_POST['traineeId'];

$dietLog = new dietLog($type, $foodName, $quantity, $calories, $traineeId);
$da = new dietLogDa();
$result = $da->registerNewDietLog($dietLog);
echo json_encode($result);

