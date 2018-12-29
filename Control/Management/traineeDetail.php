<?php

//require_once 'CommonFunction.php';
//require_once '../Model/traineeDa.php';
//require_once '../Model/trainee.php';
//require_once '../Model/healthRecordDa.php';
//require_once '../Model/healthRecord.php';
//require_once '../Model/goalDa.php';
//require_once '../Model/activityPlanDa.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';
require_once '../../Model/healthRecord.php';
require_once '../../Model/healthRecordDa.php';
require_once '../../Model/goalDa.php';
require_once '../../Model/activityPlanDa.php';

if (isset($_POST['detail'])) {
    $traineeId = $_POST['detail'];
    //<a href="../../View/Management/traineeDetail.php"></a>
    $path = "../../View/Management/traineeDetail.php";
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
    $cf = new commonFunction();
    $cf->redicrect($path);
}
if (isset($_POST['assignPlan'])) {
    $traineeId = $_POST['assignPlan'];
    $traineeDa = new traineeDa();
    $activityPlanDa = new activityPlanDa();
    $traineeName = $traineeDa->getTraineeName($traineeId);
    $allActivityPlan = $activityPlanDa->getTraineeActivityPlan($traineeId);
    session_start();
    $_SESSION['allActivityPlan'] = $allActivityPlan;
    $_SESSION['traineeId'] = $traineeId;
    $_SESSION['traineeName'] = $traineeName;
    //<a href="../../View/Management/AssignPlan.php"></a>
    $path = "../../View/Management/AssignPlan.php";
    $cf = new commonFunction();
    $cf->redicrect($path);
}
