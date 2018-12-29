<?php

require_once '../../Model/traineeDa.php';

$address = $_POST['address'];
$traineeId = $_POST['traineeId'];

$da = new traineeDa();
$result = array(
    "result" => $da->updateAddress($address, $traineeId)
);
echo json_encode($result);
