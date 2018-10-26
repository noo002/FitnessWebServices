<?php

require_once '../Model/food.php';
require_once '../Model/foodDa.php';
require_once 'CommonFunction.php';

session_start();
unset($_SESSION['foodDetail']);
$foodId = $_POST['foodId'];
$foodName = $_POST['foodName'];
$calories = $_POST['calories'];
$fat = $_POST['fat'];
$protein = $_POST['protein'];
$carbo = $_POST['carbo'];
$barcode = $_POST['barcode'];
$measurement = $_POST['measurement'];
$type = $_POST['type'];
$cf = new commonFunction();
$path = "foodList.php";

$message = "";

if (empty($foodName)) {
    $message .= "food name is required \n";
}
if (empty($calories)) {
    $message .= " calories is required \n";
}
if (!is_numeric($calories)) {
    $message .= "calories is required number\n";
}
if (empty($fat)) {
    $message .= "fat is required\n";
}
if (!is_numeric($fat)) {
    $message .= "fat is required number\n";
}
if (empty($protein)) {
    $message .= "protein is required\n";
}
if (!is_numeric($protein)) {
    $message .= "protein is required number\n";
}
if (empty($carbo)) {
    $message .= "carbohydrate is required\n";
}
if (!is_numeric($carbo)) {
    $message .= "carbohdrate is required number\n";
}
if (!empty($barcode)) {
    if (!is_numeric($barcode)) {
        $message .= "barcode required number\n";
    }
}
if (empty($measurement)) {
    $message .= "measurement is required\n";
}
if (!empty($foodName) && is_numeric($calories) && !empty($calories) && !empty($carbo) && is_numeric($carbo) &&
        !empty($fat) && is_numeric($fat) && !empty($protein) && is_numeric($protein) && !empty($measurement) &&
        !empty($type)) {
    if ($measurement == "g") {
        $measurement = 1;
    } else if ($measurement == "ml") {
        $measurement = 2;
    }
    $food = new food($foodId, $foodName, $type, $barcode, $protein, $calories, $fat, $carbo, $measurement);
    $foodDa = new foodDa();
    $result = $foodDa->updateFoodDetail($food);
    if ($result > 0) {
        $message = "$food->name was updated successfully";
    } else {
        $message = "$food->name was not updated successfully";
    }
}
$cf->messageAndRedict($message, $path);

