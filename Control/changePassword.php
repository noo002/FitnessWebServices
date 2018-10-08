<?php

require_once '../Model/managementLoginDa.php';
require_once 'CommonFunction.php';
session_start();

$currentPassword = $_POST['currentPassword'];
$managementEmail = $_SESSION['managementEmail'];

$managementDa = new managementLoginDa();
$result = $managementDa->getCurrentPassword($managementEmail, $currentPassword);


if ($result < 1 || $result > 1) {
    $message = "Current password was incorrect";
    $path = "javascript:history.go(-1)";
    $cf = new commonFunction();
    $cf->messageAndRedict($message, $path);
} else if ($result == 1) {

    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($currentPassword == $newPassword) {
        $message = "Current password and new password cannot be the same";
        $path = "javascript:history.go(-1)";
        $cf = new commonFunction();
        $cf->messageAndRedict($message, $path);
    } else {
        if ($newPassword == $confirmPassword) {
            $updatedResult = $managementDa->updateManagementPassword($managementEmail, $newPassword);
            if ($updatedResult == 1) {
                $message = "Password updated successful";
                $path = "javascript:history.go(-1)";
                $cf = new commonFunction();
                $cf->messageAndRedict($message, $path);
            } else {
                $message = "Password updated unsuccessful";
                $path = "javascript:history.go(-1)";
                $cf = new commonFunction();
                $cf->messageAndRedict($message, $path);
            }
        }
    }
}

