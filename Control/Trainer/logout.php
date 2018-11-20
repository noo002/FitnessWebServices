<?php

require_once '../CommonFunction.php';

$cf = new commonFunction();
$path = "../../View/Web/home.php";
session_start();
session_destroy();
$cf->redicrect($path);
