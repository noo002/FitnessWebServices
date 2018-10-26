<?php

require_once 'CommonFunction.php';
require_once '../Model/activity.php';
require_once '../Model/activityDa.php';

$imageExist = false;
$image = $_FILES['image'];
$cf = new commonFunction();
$pathRedict = "activityList.php";
if (!empty($image['tmp_name'])) {
    if (getimagesize($image['tmp_name'], $image['name']) == false) {
        $message = "Please upload an image";
        $cf->messageAndRedict($message, "activityList.php");
    } else {
        $path = addslashes($image['tmp_name']); //the name
        $file = file_get_contents($path);                 //the path mistaked wrong variable in very initial state
        $encodeFile = base64_encode($file);       //encoded as base64 and store to db
        //    echo '<img src="data:image/jpeg;base64,' . $encodeFile . '"/>';  //display the image in form of html
        $imageExist = true;
        $image = $encodeFile;
    }
}
if ($imageExist == false) {
    $imageDirectory = "noimage.png";
    $image = base64_encode(file_get_contents($imageDirectory));
    // echo '<img src="data:image/jpeg;base64,' . $image . '"/>';
}
$name = $_POST['name'];
$calories = $_POST['calories'];
$suggestedDuration = $_POST['time'];
$description = $_POST['description'];
$activityId = $_POST['activityId'];
$message = "";
if (empty($name)) {
    $mesage .= "Activity name is required\n";
}
if (empty($calories)) {
    $message .= "Caloreis burn per second is required\n";
}
if (empty($suggestedDuration)) {
    $message .= "Recommend time is required\n";
}
if (!is_numeric($calories)) {
    $message .= "Calories is required number";
}
if (!is_numeric($suggestedDuration)) {
    $message .= "Recommend time is required number";
}
if (empty($description)) {
    $message .= "Description is required\n";
}
if (!empty($name) && !empty($calories) && !empty($suggestedDuration) && is_numeric($calories) &&
        is_numeric($suggestedDuration) && !empty($description)) {
    $newActivity = new activity($activityId, $name, $image, $description, $calories, $suggestedDuration);
    $activityDa = new activityDa();
    $result = $activityDa->updateActivityDetail($newActivity);
    if ($result > 0) {
        $message = "$newActivity->name is updated successful";
    } else {
        $message = "$newActivity->name is updated unsuccesfsful";
    }
    $cf->messageAndRedict($message, $pathRedict);
    session_start();
    unset($_SESSION['activityDetail']);
} else {
    $cf->messageAndRedict($message, $pathRedict);
}
