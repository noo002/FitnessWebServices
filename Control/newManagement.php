<?php

require_once 'CommonFunction.php';
require_once '../Model/Management.php';
require_once '../Model/managementLoginDa.php';
require_once '../Model/email.php';

$email = $_POST['email'];
$path = "managementList.php";

$cf = new commonFunction();
if ($cf->checkEmailFormat($email) == true) {
    $managementDa = new managementLoginDa();
    $result = $managementDa->checkEmailExist($email);
    if ($result == 0) {
        $gender = $_POST['gender'];
        $name = $_POST['name'];
        $address = $_POST['address'];
        if (!empty($gender) && !empty($name) && !empty($address)) {
            $management = new Management("", $name, $gender, $address, $email, "");
            $newPassword = strtoupper($cf->random_code(6));
            $managementDa = new managementLoginDa();
            $encryptedPassword = $cf->passwordEncryption($newPassword);
            $result = $managementDa->registerNewManagement($management, $encryptedPassword);
            if ($result > 0) {
                $host = "localhost";
                $username = "FitnessApplication2018@gmail.com";
                $password = "taruc2018";
                $from = "FitnessApplication2018@gmail.com";
                $to = $email;
                $subject = "Your new Password";
                $body = "Your password is $newPassword.\n"
                        . "please enter this  password into the System.\n"
                        . "Please change your password once you access it.\n"
                        . "This is the computer generated email, no reply to it thank you,";

                $smtpEmail = new email($host, $username, $password, $from, $to, $subject, $body);
                $smtpEmail->sendEmail();
                $message = "User account has been registered";
                $cf->messageAndRedict($message, $path);
            } else {
                $message = "Problem occur during Management registration";
                $cf->messageAndRedict($message, $path);
            }
        }
    }
} else {
    $message = "Email format was invalid";
    $cf->messageAndRedict($message, $path);
}