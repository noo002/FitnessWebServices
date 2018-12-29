<?php

require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';

$name = $_POST['name'];
$address = $_POST['address'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthDate'];
$email = $_POST['email'];
$password = $_POST['password'];
$image = $_FILES['image'];

$file = addslashes(file_get_contents($image['image']['tmp_name']));

$traineeDa = new traineeDa();
$result = $traineeDa->registerNewTrainee($name, $address, $gender, $birthdate, $email, $password, $file);
echo json_encode($result);
