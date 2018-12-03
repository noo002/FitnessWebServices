<?php

require_once '../../Model/email.php';
require_once '../CommonFunction.php';
require_once '../../Model/trainerDa.php';

$email = $_POST['email'];

$cf = new commonFunction();
$path = "../../View/Web/home.php";
$trainerDa = new trainerDa();

$result = $trainerDa->checkExistedEmail($email);
if ($result == 1) {
    $trainerId = $trainerDa->getActiveTrainerId($email);
    $trainerStatus = $trainerDa->getTrainerStatus($trainerId);
    if ($trainerStatus == 3) {
        $trainerDa->unlockTrainerAccount($trainerId);
    }
    $host = "localhost";
    $username = "FitnessApplication2018@gmail.com";
    $password = "taruc2018";
    $from = "FitnessApplication2018@gmail.com";
    $to = $email;
    $subject = "Your new Password";
    $code = random_code(6);
    $code = strtoupper($code);
    $body = "Your new password is $code.\n"
            . "please enter this new password into the System.\n"
            . "Please change your password once you access it.\n"
            . "This is the computer generated email, no reply to it thank you,";

    $smtpEmail = new email($host, $username, $password, $from, $to, $subject, $body);
    $result = $smtpEmail->sendEmail();
    $trainerDa->updateTrainerPassword($email, md5($code));
    if ($result == true) {
        $message = "Please check your email";
    } else {
        $message = "problem occur";
    }
} else {
    $message = "invalid email";
}
$cf->messageAndRedict($message, $path);

function random_code($limit) {
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}

$cf->redicrect($path);

