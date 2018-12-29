<?php


//require_once '../CommonFunction.php';

require_once '../CommonFunction/CommonFunction.php';

$cf = new commonFunction();
//<a href="../../View/Home/index.html"></a>
$path = "../../View/Home/index.html";
session_start();
session_destroy();
$cf->redicrect($path);
