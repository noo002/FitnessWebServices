<?php

require_once '../../Model/traineeDa.php';

$activityId = $_POST['activityId'];

$da = new traineeDa();

$result = $da->getRanking($activityId);

echo json_encode($result);

