<?php
require_once '../../Model/dietLogDa.php';

$traineeId = $_POST['traineeId'];
$da = new dietLogDa();
$result = $da->getDietLog($traineeId);
echo json_encode($result);
