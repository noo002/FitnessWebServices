<?php

require_once '../../Model/traineeDa.php';

$traineeId = $_POST['traineeId'];
$password = $_POST['password'];

$da = new traineeDa();
$result = $da->updatePassword($traineeId, $password);
echo json_encode($result);
