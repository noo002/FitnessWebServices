<?php

require_once 'CommonFunction.php';
$cf = new commonFunction();
require_once '../Model/trainer.php';
require_once '../Model/trainee.php';
require_once '../Model/traineeDa.php';
require_once '../Model/trainerDa.php';
require_once '../Model/trainerTrackLogDa.php';
require_once '../Model/trainerTrackLog.php';

if (isset($_POST['studentList'])) {
    $studentList = $_POST['studentList'];
    session_start();
    foreach ($_SESSION['trainerList'] as $row => $key) {
        if ($key->id == $studentList) {
            $_SESSION['studentListValue'] = $row;
            break;
        }
    }
    $traineeDa = new traineeDa();
    $traineeListByTrainer = $traineeDa->getTraineeListByTrainer($studentList);
    if (empty($traineeListByTrainer)) {

        $message = "No student Handled by " . $_SESSION['trainerList'][$_SESSION['studentListValue']]->name;
        $path = "trainerList.php";
        $cf->messageAndRedict($message, $path);
    } else {
        $_SESSION['traineeListByTrainer'] = $traineeListByTrainer;
        $path = "../View/Web/Management/TraineeHandledByTrainer.php";
        $cf->redicrect($path);
    }
} else if (isset($_POST['activation'])) {
    $trainerId = $_POST['activation'];
    $trainerDa = new trainerDa();
    $result = $trainerDa->updatetrainerActivation($trainerId);
    $message = "The status of trainer was changed";
    $cf = new commonFunction();
    $path = "trainerList.php";
    $cf->messageAndRedict($message, $path);
} else if (isset($_POST['detail'])) {
    $trainerId = $_POST['detail'];
    $path = "../View/Web/Management/trainerDetail.php";
    session_start();
    $da = new trainerTrackLogDa();
    $s = array();
    for ($i = 1; $i < 12; $i++) {
        $r = array(
           "Total" => $da->getTrainerTrackLog($trainerId, $i)
        );
        array_push($s, $r);
    }
    $_SESSION['trainerTrackLog'] = $s;
    
    $cf = new commonFunction();
    $cf->redicrect($path);
} else {
    $cf = new commonFunction();
    $path = "trainerList.php";
    $message = "Problem occur, please contact IT support for recovery";
    $cf->messageAndRedict($message, $path);
}