<?php

require_once '../Model/managementLoginDa.php';
require_once 'CommonFunction.php';
session_start();

$currentPassword = $_POST['currentPassword'];
$managementEmail = $_SESSION['managementEmail'];

$managementDa = new managementLoginDa();
$result = $managementDa->getCurrentPassword($managementEmail, md5($currentPassword));


if ($result < 1 || $result > 1) {
    $message = "Current password was incorrect";
    $path = "security.php";
    $cf = new commonFunction();
    $cf->messageAndRedict($message, $path);
} else if ($result == 1) {

    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($currentPassword == $newPassword) {
        $message = "Current password and new password cannot be the same";
        $path = "security.php";
        $cf = new commonFunction();
        $cf->messageAndRedict($message, $path);
    } else {
        if ($newPassword == $confirmPassword) {
            $updatedResult = $managementDa->updateManagementPassword($managementEmail, md5($newPassword));
            if ($updatedResult == 1) {
                $message = "Password updated successful";
                $path = "security.php";
                $cf = new commonFunction();
                $cf->messageAndRedict($message, $path);
            } else {
                $message = "Password updated unsuccessful";
                $path = "security.php";
                $cf = new commonFunction();
                $cf->messageAndRedict($message, $path);
            }
        }
    }
}

