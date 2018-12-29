<?php

//require_once '../Model/managementLoginDa.php';
//require_once '../Model/email.php';
//require_once '../Control/CommonFunction.php';
require_once '../../Model/email.php';
require_once '../../Model/managementLoginDa.php';
require_once '../CommonFunction/CommonFunction.php';

$email = $_POST['managementEmailPass'];

$managementDa = new managementLoginDa();
$result = $managementDa->checkEmailExist($email);
if ($result == true) {
    $managementId = $managementDa->getManagementId($email);
    $status = $managementDa->getManagementStatus($managementId);
    if ($status == 1 || $status == 3) {
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
        $cf = new commonFunction();
        $code = $cf->passwordEncryption($code);
        $result1 = $managementDa->updateManagementPassword($email, $code);
        if ($status == 3) {
            $managementDa->unlockManagementStatus($managementId);
        }
        $path = "../../View/Login/managementPasswordRecovery.html";
        //   <a href = "../../View/Login/managementPasswordRecovery.html"></a>
        //<a href="../../View/Login/managementLogin.html"></a>
        if ($result == true && $result1 == 1) {
            $message = "please check your email";
            $path = "../../View/Login/managementLogin.html";
            $cf->messageAndRedict($message, $path);
        } else {
            $message = "problem occur";
            $cf->messageAndRedict($message, $path);
        }
    }
} else {
    $cf = new commonFunction();
    $message = "Email are invalid";
    $path = "../../View/Login/managementPasswordRecovery.html";
    $cf->messageAndRedict($message, $path);
}

function random_code($limit) {
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}
