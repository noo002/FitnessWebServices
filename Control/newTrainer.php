<?php

//    private $name, $gender, $email, $experience, $certificate, $status;

require_once '../Model/trainer.php';
require_once '../Model/trainerDa.php';
require_once 'CommonFunction.php';
require_once '../Model/email.php';

$email = $_POST['email'];

$cf = new commonFunction();
$path = "trainerList.php";
if (!$cf->checkEmailFormat($email)) {
    $message = "Invalid email format please reenter";
    $cf->messageAndRedict($message, $path);
}
if ($cf->checkEmailFormat($email) == true) {
    $trainerDa = new trainerDa();
    $result = $trainerDa->checkExistedEmail($email);
    if ($result == 0) {
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $cert = $_POST['cert'];
        $year = $_POST['year'];
        $address = $_POST['address'];
        $birthdate = $_POST['birthdate'];
        if (!empty($name) && !empty($gender) && !empty($cert) && !empty($year) && !empty($address) && !empty($birthdate) && year >= 0) {
            $trainer = new trainer($name, $address, $gender, $birthdate, $email, $year, $cert);

            $trainerPassword = random_code(6);
            $trainerPassword = strtoupper($trainerPassword);
            $encryptedPassword = $cf->passwordEncryption($trainerPassword);
            $result = $trainerDa->registerNewTrainer($trainer, $encryptedPassword);
            if ($result > 0) {
                session_start();
                unset($_SESSION['trainerList']);
                $trainerList = $trainerDa->getAllTrainer();
                $_SESSION['trainerList'] = $trainerList;
                $host = "localhost";
                $username = "FitnessApplication2018@gmail.com";
                $password = "taruc2018";
                $from = "FitnessApplication2018@gmail.com";
                $to = "eugence966@hotmail.com";
                $subject = "Your new Password";
                $body = "Your password is $trainerPassword.\n"
                        . "please enter this  password into the System.\n"
                        . "Please change your password once you access it.\n"
                        . "This is the computer generated email, no reply to it thank you,";

                $smtpEmail = new email($host, $username, $password, $from, $to, $subject, $body);
                $smtpEmail->sendEmail();
                $message = "New Trainer have successful registered";
                $cf->messageAndRedict($message, $path);
            } else {
                $message = "Problem occur during trainer registration";
                $cf->messageAndRedict($message, $path);
            }
        } else {
            echo "something wrong";
        }
    } else {
        $message = "Email have used";
        $cf->messageAndRedict($message, $path);
    }
}

function random_code($limit) {
    return substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
}
