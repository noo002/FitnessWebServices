<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'CommonFunction.php';
require_once '../Model/managementLoginDa.php';
require_once '../Model/traineeDa.php';
require_once '../Model/trainee.php';
require_once '../Model/Management.php';
require_once '../Model/managementLoginLogDa.php';
require_once '../Model/managementLoginLog.php';
require_once '../Model/email.php';

$managementEmail = filter_input(INPUT_POST, "managementEmail");
$managementPassword = filter_input(INPUT_POST, "managementPassword");
$cf = new commonFunction();
$path = "../View/Web/home.php";

//validation in server side, which mean have 2 side validation client and server
if (empty($managementEmail)) {
    $message = "the email was empty";
    $cf->messageAndRedict($message, $path);
}
if (!$cf->checkEmailFormat($managementEmail)) {
    $message = "Email was invalid";
    $cf->messageAndRedict($message, $path);
}
if (empty($managementPassword)) {
    $message = "the password was empty";
    $cf->messageAndRedict($message, $path);
}
if (!empty($managementEmail) && !empty($managementPassword)) {
    $managementDa = new managementLoginDa();
    $managementPassword = $cf->passwordEncryption($managementPassword);
    $result = $managementDa->managementLogin($managementEmail, $managementPassword);
    if ($result > 1 || $result < 0 || $result == 0) {
        if ($managementDa->checkEmailExist($managementEmail) == true) {
            $managementId = $managementDa->getManagementId($managementEmail);
            $managementStatus = $managementDa->getManagementStatus($managementId);
            if ($managementStatus == 1 || $managementStatus == 3) {
                $managementLoginLogDa = new managementLoginLogDa();
                $managementLoginLog = new managementLoginLog($managementId, 2);
                $result = $managementLoginLogDa->insertNewloginLog($managementLoginLog);
            }
            if ($managementStatus == 1) {
                session_start();
                if (!isset($_SESSION['count'])) {
                    $_SESSION['count'] = 1;
                } else {
                    $_SESSION['count'] = $_SESSION['count'] + 1;
                }
                if ($_SESSION['count'] == 3) {
                    $_SESSION['count'] = 0;
                    $managementDa->lockManagementStatus($managementId);
                    $host = "localhost";
                    $username = "FitnessApplication2018@gmail.com";
                    $password = "taruc2018";
                    $from = "FitnessApplication2018@gmail.com";
                    $to = $managementEmail;
                    $subject = "Locked your Account";
                    $body = "Your account have been enter wrong password more than 3 time \n"
                            . " therefore your account currently been locked please perform password recovery\n"
                            . " in order to access";

                    $smtpEmail = new email($host, $username, $password, $from, $to, $subject, $body);
                    $result = $smtpEmail->sendEmail();
                }
            }
        }
        $cf->message("Invalid email or password");
        $cf->redicrect("../View/Web/home.php");
    } else if ($result == 1) {
        session_start();
        if (isset($_SESSION['count'])) {
            unset($_SESSION['count']);
        }
        $managementLoginLogDa = new managementLoginLogDa();
        $managementId = $managementDa->getManagementId($managementEmail);
        $managementLoginLog = new managementLoginLog($managementId, 1);
        $result = $managementLoginLogDa->insertNewloginLog($managementLoginLog);
        $_SESSION['managementEmail'] = $managementEmail;
        $management = $managementDa->getManagementDetail($managementEmail, $managementPassword);
        $_SESSION['managementDetail'] = $management;
        $path = "security.php";
        $managementLoginLogId = $managementLoginLogDa->getManagementPast();
        if (!empty($managementLoginLogId)) {
            foreach ($managementLoginLogId as $row => $key) {
                $managementLoginLogDa->deleteManagementLog($key['managementLoginLogId']);
            }
        }
        $cf->messageAndRedict("Welcome", $path);
    }
}

