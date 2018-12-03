<?php

require_once '../CommonFunction.php';
require_once '../../Model/trainer.php';
require_once '../../Model/trainerDa.php';
require_once '../../Model/trainerLoginLog.php';
require_once '../../Model/trainerLoginLogDa.php';
require_once '../../Model/email.php';

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
            session_start();
            if ($result == 1) {
                //perform login log and then access system
                if (isset($_SESSION['count'])) {
                    unset($_SESSION['count']);
                }
                $trainerId = $trainerDa->getActiveTrainerId($email);
                $trainerLoginLog = new trainerLoginLog(1, $trainerId);
                $trainerLoginLogDa = new trainerLoginLogDa();
                $result = $trainerLoginLogDa->insertTrainerLoginLog($trainerLoginLog);
                $message = "ok";
                $loginPath = "security.php";
                $trainerDetail = $trainerDa->getTrainerDetail($email);
                $_SESSION['trainerDetail'] = $trainerDetail;
                $cf->messageAndRedict($message, $loginPath);
            } else if ($result > 1) {
                $message = "This trainer cannot login to the system due to the duplication of email";
                $cf->messageAndRedict($message, $path);
            } else if ($result < 1) {
                $trainerId = $trainerDa->getActiveTrainerId($email);
                $trainerStatus = $trainerDa->getTrainerStatus($trainerId);
                if ($trainerStatus == 1 || $trainerStatus == 3) {
                    $trainerLoginLog = new trainerLoginLog(2, $trainerId);
                    $trainerLoginLogDa = new trainerLoginLogDa();
                    $trainerLoginLogDa->insertTrainerLoginLog($trainerLoginLog);
                    if ($trainerStatus == 1) {
                        if (!isset($_SESSION['count'])) {
                            $_SESSION['count'] = 1;
                        } else {
                            $_SESSION['count'] = $_SESSION['count'] + 1;
                        }
                        if ($_SESSION['count'] == 3) {
                            $_SESSION['count'] = 0;
                            $trainerDa->lockTrainerAccount($trainerId);
                            $host = "localhost";
                            $username = "FitnessApplication2018@gmail.com";
                            $password = "taruc2018";
                            $from = "FitnessApplication2018@gmail.com";
                            $to = "eugence966@hotmail.com";
                            $subject = "Locked your Account";
                            $body = "Your account have been enter wrong password more than 3 time \n"
                                    . " therefore your account currently been locked please perform password recovery\n"
                                    . " in order to access";

                            $smtpEmail = new email($host, $username, $password, $from, $to, $subject, $body);
                            $result = $smtpEmail->sendEmail();
                        }
                    }
                    $message = "Invalid email or password";
                    //if same email then save to loginlog for fail
                    $cf->messageAndRedict($message, $path);
                } else {
                    $message = "Invalid email or password";
                    $cf->messageAndRedict($message, $path);
                }
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

