<?php

require_once '../../Model/traineeDa.php';

$email = $_POST['email'];
$password = $_POST['password'];

$da = new traineeDa();
$result = $da->traineeLogin($email, $password);

echo json_encode($result);
