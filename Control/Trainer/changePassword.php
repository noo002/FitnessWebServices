<?php

//require_once '../CommonFunction.php';
//require_once '../../Model/trainerDa.php';
//require_once '../../Model/trainer.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/trainerDa.php';
require_once '../../Model/trainer.php';

$currentPassword = $_POST['password'];
$newPassword = $_POST['newPassword'];
$confirmPassword = $_POST['confirmPassword'];

session_start();
$trainerDa = new trainerDa();
$cf = new commonFunction();
//<a href="../../View/Trainer/changePassword.php"></a>
$path = "../../View/Trainer/changePassword.php";
$trainerId = $_SESSION['trainerDetail']->id;
$databasePassword = $trainerDa->getDatabasePassword($trainerId);
if (md5($currentPassword) == $databasePassword) {
    if ($newPassword == $confirmPassword) {
        if (md5($newPassword) == $databasePassword) {
            $message = "Old password and New password cannot be the same!";
        } else {
            $email = $_SESSION['trainerDetail']->email;
            $result = $trainerDa->updateTrainerPassword($email, md5($confirmPassword));
            $message = "Your password have been changed!";
        }
    } else {
        $message = "New Password and Confirmed Password are Different!";
    }
} else {
    $message = "Password was incorrect!";
}
$cf->messageAndRedict($message, $path);
