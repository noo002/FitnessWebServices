<?php

//    private $name, $gender, $email, $experience, $certificate, $status;

require_once '../Model/trainer.php';
require_once '../Model/trainerDa.php';
require_once 'CommonFunction.php';
require_once '../Model/email.php';

$email = $_POST['email'];

$cf = new commonFunction();
$path = "javascript:history.go(-1)";
if (!$cf->checkEmailFormat($email)) {
    $message = "Invalid email format please reenter";
    $cf->messageAndRedict($message, $path);
}
if ($cf->checkEmailFormat($email) == true) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $cert = $_POST['cert'];
    $year = $_POST['year'];
    if (!empty($name) && !empty($gender) && !empty($cert) && !empty($year)) {
       
        
    }
}
