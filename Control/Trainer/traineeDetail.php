<?php

require_once '../CommonFunction.php';
require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';
require_once '../../Model/healthRecord.php';
require_once '../../Model/healthRecordDa.php';
require_once '../../Model/goalDa.php';
require_once '../../Model/trainerTrackLogDa.php';
require_once '../../Model/trainerTrackLog.php';
require_once '../../Control/Trainer/facadeTrainerTracking.php';
require_once '../../Model/trainer.php';
/*
 * require_once 'CommonFunction.php';
  require_once '../Model/traineeDa.php';
  require_once '../Model/trainee.php';
  require_once '../Model/healthRecordDa.php';
  require_once '../Model/healthRecord.php';
  require_once '../Model/goalDa.php';
 */

$traineeId = $_POST['detail'];
$path = "../../View/Web/Trainer/traineeDetail.php";
$traineeDa = new traineeDa();
$healthRecordDa = new healthRecordDa();
$goalDa = new goalDa();
$traineeDetail = $traineeDa->getTraineeDetail($traineeId);
$currentHeathRecord = $healthRecordDa->getCurrentHealthRecord($traineeId);
$allHealthRecord = $healthRecordDa->getTraineeAllHealthRecord($traineeId);
$goalDetail = $goalDa->getTraineeGoalDetail($traineeId);
session_start();
$_SESSION['traineeDetail'] = $traineeDetail;
$_SESSION['currentHealthRecord'] = $currentHeathRecord;
$_SESSION['allHealthRecord'] = $allHealthRecord;
$_SESSION['goalDetail'] = $goalDetail;
$trainerId = $_SESSION['trainerDetail']->id;
$trackCode = 1;
$trainerTrackLog = new trainerTrackLog($trainerId, $trackCode);
$facadeTrainer = new facadeTrainerTracking($trainerTrackLog);
$facadeTrainer->processTrackLog();
$cf = new commonFunction();
$cf->redicrect($path);
