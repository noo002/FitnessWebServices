<?php

require_once '../../Model/healthRecord.php';
require_once '../../Model/healthRecordDa.php';


$traineeId = $_POST['traineeId'];
$da = new healthRecordDa();

$result = $da->getHealthRecord($traineeId);
echo json_encode($result);
