<?php

require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';

$email = $_POST['email'];

$da = new traineeDa();
$result = $da->getUser($email);
echo json_encode($result);
