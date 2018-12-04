<?php

require_once '../../Model/foodDa.php';

$barcode = $_POST['barcode'];

$foodDa = new foodDa();
$foodId = $foodDa->barcodeSearch($barcode);
echo json_encode($foodId);
