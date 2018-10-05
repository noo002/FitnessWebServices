<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

session_start();
require_once './CommonFunction.php';
session_destroy();
$path = "../View/Web/home.php";
$cf = new commonFunction();
$cf->redicrect($path);
