<?php

//require_once 'CommonFunction.php';
//require_once '../Model/food.php';
//require_once 'facadeNewFood.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/food.php';
require_once '../facadeDesignPattern/facadeNewFood.php';

$foodName = $_POST['foodName'];
$calories = $_POST['calories'];
$fat = $_POST['fat'];
$protein = $_POST['protein'];
$carbo = $_POST['carbo'];
$barcode = $_POST['barcode'];
$measurement = $_POST['measurement'];
$foodType = $_POST['foodType'];
$unitOfMeasurement = $_POST['unitOfMeasurement'];

$path = "foodList.php";
$cf = new commonFunction();
if (empty($barcode)) {
    $barcode = 0;
}
if (is_numeric($calories) && !empty($calories) && !empty($fat) && is_numeric($fat) && !empty($protein) && is_numeric($protein) && !empty($carbo) && is_numeric($carbo) && is_numeric($measurement) && !empty($measurement) && !empty($foodType) && !empty($unitOfMeasurement)
) {
    $food = new food("", $foodName, $foodType, $barcode, $protein, $calories, $fat, $carbo, $measurement);
    $food->setUnitOfMeasurement($unitOfMeasurement);
    $facadeNewFood = new facadeNewFood($food);
    $result = $facadeNewFood->processFood();
    if ($result > 0) {
        $message = "$foodName has been created";
    } else {
        $message = "problem occur during creating new food\n please contact internal staff";
    }
    $cf->messageAndRedict($message, $path);
} else {
    $message = "please make sure fill in all the detail before you submit";
    $cf->messageAndRedict($message, $path);
}

