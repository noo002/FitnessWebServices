<?php

require_once '../CommonFunction.php';
require_once '../../Model/trainer.php';
require_once '../../Model/trainerDa.php';
require_once '../../Model/trainerLoginLog.php';
require_once '../../Model/trainerLoginLogDa.php';

$email = $_POST['email'];
$password = $_POST['password'];

$cf = new commonFunction();
$path = "../../View/Web/home.php";
if (!empty($email) && !empty($password)) {
    if ($cf->checkEmailFormat($email) == true) {
        $trainerDa = new trainerDa();
        //check email existed 
        if ($trainerDa->checkExistedEmail($email) == 1) {
            $result = $trainerDa->trainerLogin($email, md5($password));
            if ($result == 1) {
                //perform login log and then access system
                $trainerId = $trainerDa->getActiveTrainerId($email);
                $trainerLoginLog = new trainerLoginLog(1, $trainerId);
                $trainerLoginLogDa = new trainerLoginLogDa();
                $result = $trainerLoginLogDa->insertTrainerLoginLog($trainerLoginLog);
                $message = "ok";
                $loginPath = "traineeList.php";
                $trainerDetail = $trainerDa->getTrainerDetail($email);
                session_start();
                $_SESSION['trainerDetail'] = $trainerDetail;
                $cf->messageAndRedict($message, $loginPath);
            } else if ($result > 1) {
                $message = "This trainer cannot login to the system due to the duplication of email";
                $cf->messageAndRedict($message, $path);
            } else if ($result < 1) {
                $trainerId = $trainerDa->getActiveTrainerId($email);
                $trainerLoginLog = new trainerLoginLog(2, $trainerId);
                $trainerLoginLogDa = new trainerLoginLogDa();
                $result = $trainerLoginLogDa->insertTrainerLoginLog($trainerLoginLog);
                $message = "Invalid email or password";
                //if same email then save to loginlog for fail
                $cf->messageAndRedict($message, $path);
            }
        } else {
            $message = "Invalid email or password";
            $cf->messageAndRedict($message, $path);
        }
    } else {
        $message = "Invalid email or password";
        $cf->messageAndRedict($message, $path);
    }
} else {
    $message = "Please make sure that you have fill in all the detail provided";
    $cf->messageAndRedict($message, $path);
}

