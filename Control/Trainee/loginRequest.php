<?php

require_once '../../Model/traineeDa.php';

$email = $_POST['email'];
$password = $_POST['password'];
//$email = "weikit55@gmail.com";
//$password = "123456";

$da = new traineeDa();
$result = $da->traineeLogin($email, $password);

echo json_encode($result);
