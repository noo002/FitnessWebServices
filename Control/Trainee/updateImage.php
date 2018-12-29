<?php

require_once '../../Model/trainee.php';
require_once '../../Model/traineeDa.php';

$traineeId = $_POST['traineeId'];
$image = $_FILES['image'];

$file = addslashes(file_get_contents($image['image']['tmp_name']));
$traineeDa = new traineeDa();
$result = $traineeDa->updateImage($traineeId, $file);
echo json_encode($result);
