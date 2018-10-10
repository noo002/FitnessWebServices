<?php

require_once 'CommonFunction.php';
require_once '../Model/food.php';


$foodName = $_POST['foodName'];
$calories = $_POST['calories'];
$fat = $_POST['fat'];
$protein = $_POST['protein'];
$carbo = $_POST['carbo'];
$barcode = $_POST['barcode'];
$measurement = $_POST['measurement'];
$foodType = $_POST['foodType'];

$path = "foodList.php";
$cf = new commonFunction();
if (ctype_alpha($foodName)) {
    if (empty($barcode)) {
        $barcode = 0;
    }
    if (is_numeric($calories) && !empty($calories) && !empty($fat) && is_numeric($fat) && !empty($protein) && is_numeric($protein) && !empty($carbo) && is_numeric($carbo) && is_numeric($measurement) && !empty($measurement)&&!empty($foodType)) {
        echo "all validation done";
    }else{
        echo "i hate you noob";
    }
} else {
    $message = "food name must be letter only";
    $cf->messageAndRedict($message, $path);
}
