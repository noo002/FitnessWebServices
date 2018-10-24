<?php
require_once 'CommonFunction.php';
require_once '../Model/managementLoginDa.php';

$managementId = $_POST['activation'];
$managementDa = new managementLoginDa();
$result = $managementDa->updateActivationManagement($managementId);
$path = "managementList.php";
if($result >0){
    $message = "This management was changed";
}else{
    $message = "Problem occur, please contact IT support for recovery";
}
$cf = new commonFunction();
$cf->messageAndRedict($message, $path);