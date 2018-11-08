<?php



$type = $_POST['type'];
$description = $_POST['description'];
$duration = $_POST['duration'];
$distance = $_POST['distance'];
$traineeId = $_POST['traineeId'];

$toString = "";

if (!is_numeric($type) || empty($type)) {
    $toString .= " type only can be number and not be blank\n";
}
if (!is_numeric($description) || empty($description)) {
    $toString .= " description only can be number and not be blank\n";
}if (!is_numeric($duration) || empty($duration)) {
    $toString .= " duration only can be number and not be blank\n";
}if (!is_numeric($distance) || empty($distance)) {
    $toString .= " distance only can be number and not be blank\n";
}if (!is_numeric($traineeId) || empty($traineeId)) {
    $toString .= " traineeId only can be number and not be blank\n";
}
if(is_numeric($type)&&!empty($type)&&is_numeric($description)&&!empty($description)&&is_numeric($duration)
&&!empty($duration)&&is_numeric($distance)&&!empty($distance)&&is_numeric($traineeId)&&!empty($traineeId)) {
    $activityLogDa = new activityLogDa();
    $activityLog = new activityLog($type, $description, $duration, $distance, $traineeId);
    $result = $activityLogDa->registerNewActivityLog($activityLog);
}