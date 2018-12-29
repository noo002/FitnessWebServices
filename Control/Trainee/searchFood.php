<?php

require_once '../../Model/food.php';
require_once '../../Model/foodDa.php';

$name = $_POST['name'];

$da = new foodDa();
$result = $da->getSearchFood($name);
echo json_encode($result);
