<?php

//require_once '../Model/managementLoginDa.php';
//require_once 'CommonFunction.php';
require_once '../../Model/managementLoginDa.php';
require_once '../CommonFunction/CommonFunction.php';

session_start();

$currentPassword = $_POST['currentPassword'];
$managementEmail = $_SESSION['managementEmail'];

$managementDa = new managementLoginDa();
$result = $managementDa->getCurrentPassword($managementEmail, md5($currentPassword));
$path = "../../View/Management/changePassword.php";

if ($result < 1 || $result > 1) {
    $message = "Current password was incorrect";
    //<a href="../../View/Management/changePassword.php"></a>

    $cf = new commonFunction();
    $cf->messageAndRedict($message, $path);
} else if ($result == 1) {

    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    if ($currentPassword == $newPassword) {
        $message = "Current password and new password cannot be the same";
        $cf = new commonFunction();
        $cf->messageAndRedict($message, $path);
    } else {
        if ($newPassword == $confirmPassword) {
            $updatedResult = $managementDa->updateManagementPassword($managementEmail, md5($newPassword));
            if ($updatedResult == 1) {
                $message = "Password updated successful";

                $cf = new commonFunction();
                $cf->messageAndRedict($message, $path);
            } else {
                $message = "Password updated unsuccessful";
                $cf = new commonFunction();
                $cf->messageAndRedict($message, $path);
            }
        }
    }
}

