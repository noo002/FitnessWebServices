<?php

require_once '../../Model/traineeDa.php';

$traineeId = $_POST['traineeId'];
$name = $_POST['name'];

$da = new traineeDa();
$result = $da->updateTraineeName($traineeId, $name);
echo json_encode($result);
