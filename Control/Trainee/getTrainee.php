<?php

require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';

//$email = $_POST['email'];
$email = "weikit55@gmail.com";

$da = new traineeDa();
$result = $da->getUser($email);
echo json_encode($result);
