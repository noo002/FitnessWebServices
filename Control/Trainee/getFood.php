<?php

require_once '../../Model/food.php';
require_once '../../Model/foodDa.php';



$foodId = $_POST['foodId'];
$da = new foodDa();
$result = $da->getFoodDetail($foodId);
echo json_encode($result);
