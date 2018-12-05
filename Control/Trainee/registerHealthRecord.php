<?php

require_once '../../Model/healthRecord.php';
require_once '../../Model/healthRecordDa.php';


$traineeId = $_POST['traineeId'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$description = $_POST['description'];


$da = new healthRecordDa();
$result = $da->registerNewHealthRecord($traineeId, $weight, $height, $description);
echo json_encode($result);
