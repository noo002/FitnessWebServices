<?php
require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';

$gender = $_POST['gender'];
$traineeId = $_POST['traineeId'];

$da = new traineeDa();
$result = $da->updateGender($traineeId, $gender);

echo json_encode($result);

