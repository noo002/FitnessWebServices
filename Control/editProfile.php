<?php

require_once 'CommonFunction.php';
require_once '../Model/managementLoginDa.php';

$name = $_POST['name'];
$gender = $_POST['gender'];
session_start();
$managementEmail = $_SESSION['managementEmail'];
$cf = new commonFunction();
$path = "javascript:history.go(-1)";

if(empty($name)){
    $message = "name cannot be blank";
    $cf->messageAndRedict($message, $path);
}
if(empty($gender)){
    $message = "gender cannot be blank"; 
    $cf->messageAndRedict($message, $path);
}

if(!empty($name)&&!empty($gender)){
   $managementDa = new managementLoginDa();
   $result = $managementDa->updateManagementProfile($managementEmail, $name, $gender);
   if($result > 0){
       $message = "Profile updated successful";
       $cf->messageAndRedict($message, $path);
   }
   else{
       $message = "Profile update unsuccesful";
       $cf->messageAndRedict($message, $path);
   }
}
