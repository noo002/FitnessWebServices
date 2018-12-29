<?php

require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';

$email = $_POST['email'];
$password = $_POST['password'];
$da = new traineeDa();
$result = $da->updateTraineePassword($email, $password);
echo json_encode($result);
