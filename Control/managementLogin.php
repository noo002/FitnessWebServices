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
    $result = $managementDa->managementLogin($managementEmail, $managementPassword);
    if ($result > 1 || $result < 0 || $result == 0) {
        $cf->message("Invalid email or password");
        $cf->redicrect("../View/Web/home.php");
    } else if ($result == 1) {
        session_start();
        $_SESSION['managementEmail'] = $managementEmail;
        $management = $managementDa->getManagementDetail($managementEmail, $managementPassword);
        $_SESSION['managementDetail']  = $management;
        $path = "../View/Web/Management/studentList.php";
        $cf->messageAndRedict("Welcome", $path);
    }
}