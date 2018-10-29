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
            session_start();
            if (!isset($_SESSION['count'])) {
                $_SESSION['count'] = 1;
            } else {
                $_SESSION['count'] = $_SESSION['count'] + 1;
            }
            $managementLoginLogDa = new managementLoginLogDa();
            // noted 2 for below statement indicate unsuccessful
            $managementId = $managementDa->getManagementId($managementEmail);
            $managementLoginLog = new managementLoginLog($managementId, 2);
            $managementLoginLogDa->insertNewloginLog($managementLoginLog);
            if ($_SESSION['count'] == 3) {
                if ($managementDa->getManagementStatus($managementId) == 1) {
                    $managementDa->deactivateManagement($managementId);
                    $managementDa->lockManagementStatus($managementId);
                    $host = "localhost";
                    $username = "FitnessApplication2018@gmail.com";
                    $password = "taruc2018";
                    $from = "FitnessApplication2018@gmail.com";
                    $to = $managementEmail;
                    $subject = "Deactivated your Account";
                    $body = "Your account have been detected for other people entered wrong password"
                            . " at least 3 time, for your security purpose, system was locked your account"
                            . " please perform password recovery to release your account and remember"
                            . " change your password";
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
        $cf->messageAndRedict("Welcome", $path);
    }
}