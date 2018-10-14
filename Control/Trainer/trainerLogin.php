<?php

require_once '../CommonFunction.php';
require_once '../../Model/trainer.php';
require_once '../../Model/trainerDa.php';

$email = $_POST['email'];
$password = $_POST['password'];

$cf = new commonFunction();
$path = "../../View/Web/home.php";
if (!empty($email) && !empty($password)) {
    if ($cf->checkEmailFormat($email) == true) {
        $trainerDa = new trainerDa();
        $result = $trainerDa->trainerLogin($email, $password);
        echo $result;
        if ($result == 1) {
            $message = "ok";
            $cf->messageAndRedict($message, $path);
        } else if ($result > 1) {
            $message = "This trainer cannot login to the system due to the duplication of email";
            $cf->messageAndRedict($message, $path);
        } else if ($result < 1) {
            $message = "Invalid email or password";
            $cf->messageAndRedict($message, $path);
        }
    }
} else {
    $message = "Please make sure that you have fill in all the detail provided";
    $cf->messageAndRedict($message, $path);
}

