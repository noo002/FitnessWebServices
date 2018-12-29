<?php

require_once '../CommonFunction/CommonFunction.php';

session_start();
session_destroy();


$cf = new commonFunction();
$path = "../../View/Home/index.html";
$message = "You have logout to the system.";
$cf->messageAndRedict($message, $path);
