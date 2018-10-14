<?php

require_once '../Model/managementLoginDa.php';
require_once '../Model/email.php';
require_once '../Control/CommonFunction.php';

$email = $_POST['managementEmailPass'];

$managementDa = new managementLoginDa();
$result = $managementDa->checkEmailExist($email);
if ($result == true) {
    $host = "localhost";
    $username = "FitnessApplication2018@gmail.com";
    $password = "taruc2018";
    $from = "FitnessApplication2018@gmail.com";
    $to = $email;
    $subject = "Your new Password";
    $code = random_code(6);
    strtoupper($code);
    $body = "Your new password is $code.\n"
            . "please enter this new password into the System.\n"
            . "Please change your password once you access it.\n"
            . "This is the computer generated email, no reply to it thank you,";

    $smtpEmail = new email($host, $username, $password, $from, $to, $subject, $body);
    $result = $smtpEmail->sendEmail();
    $result1 = $managementDa->updateManagementPassword($email, $code);
    $cf = new commonFunction();
    $path = "../View/Web/home.php";

    if ($result == true && $result1 == 1) {
        $message = "please check your email";
        $cf->messageAndRedict($message, $path);
    } else {
        $message = "problem occur";
        $cf->messageAndRedict($message, $path);
    }
} else {
    $cf = new commonFunction();
    $message = "Email are invalid";
    $path = "../View/Web/home.php";
    $cf->messageAndRedict($message, $path);
}

function random_code($limit) {
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}
