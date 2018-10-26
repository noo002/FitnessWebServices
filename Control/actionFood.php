<?php

require_once '../Control/CommonFunction.php';
require_once '../Model/foodDa.php';
require_once '../Model/food.php';

$cf = new commonFunction();
if (isset($_POST['edit'])) {
    $foodId = $_POST['edit'];
    $path = "../View/Web/Management/editFood.php";
    $foodDa = new foodDa();
    $food = $foodDa->getFoodDetail($foodId);
    session_start();
    $_SESSION['foodDetail'] = $food;
    $cf->redicrect($path);
} else if (isset($_POST['status'])) {
    $foodId = $_POST['status'];
    $foodDa = new foodDa();
    $result = $foodDa->updateStatus($foodId);
    $path = "foodList.php";
    if ($result > 0) {
        $message = "The food status was updated";
    } else if ($result < 0) {
        $message = " Internal error occur, please contact IT staff";
    }
    $cf->messageAndRedict($message, $path);
}






















