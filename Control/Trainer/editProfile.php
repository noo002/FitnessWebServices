<?php
//
//require_once '../CommonFunction.php';
//require_once '../../Model/trainer.php';
//require_once '../../Model/trainerDa.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/trainer.php';
require_once '../../Model/trainerDa.php';

$name = $_POST['name'];
$gender = $_POST['gender'];
$cert = $_POST['cert'];
$year = $_POST['year'];

$message = "";
$error = false;
session_start();
$trainerDa = new trainerDa();
if (empty($name)) {
    $message .= 'Name cannot be blank\n';
    $error = true;
}
if (empty($gender)) {
    $message .= 'Must choose your gender\n';
    $error = true;
}
if ($gender < 1 || $gender > 2) {
    $message .= 'Please select Male or female as your gender\n';
    $error = true;
}
if (empty($year)) {
    $message .= 'Please enter your year experience\n';
    $error = true;
}
if (empty($cert)) {
    $cert = $_SESSION['trainerDetail']->certificate;
}
if (!$error && !empty($cert)) {
    $email = $_SESSION['trainerDetail']->email;

    $result = $trainerDa->updateTrainerDetail($_SESSION['trainerDetail']->id, $name, $gender, $cert, $year);
    $message = $name . " your profile is updated";
    $_SESSION['trainerDetail'] = $trainerDa->getTrainerDetail($email);
}
$cf = new commonFunction();
//<a href="../../View/Trainer/profile.php"></a>
$path = "../../View/Trainer/profile.php";
$cf->messageAndRedict($message, $path);

