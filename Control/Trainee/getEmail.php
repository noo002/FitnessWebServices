<?php

require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';

$email = $_POST['email'];


$da = new traineeDa();
$result = $da->getTraineeEmail($email);

echo json_encode($result);
