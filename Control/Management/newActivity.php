<?php

//require_once 'CommonFunction.php';
//require_once '../Model/activity.php';
//require_once 'facadeNewActivity.php';

require_once '../CommonFunction/CommonFunction.php';
require_once '../../Model/activity.php';
require_once '../facadeDesignPattern/facadeNewActivity.php';

$imageExist = false;
$image = $_FILES['fileToUpload'];
$name = $_POST['name'];
$desc = $_POST['desc'];
$calories = $_POST['calories'];
$recommendTime = $_POST['recommendTime'];

$path = "activityList.php";
$cf = new commonFunction();
if (!empty($image['tmp_name'])) {
    if (getimagesize($image['tmp_name'], $image['name']) == false) {
        $message = "Please upload an image";
        $cf->messageAndRedict($message, "activityList.php");
    } else {
        $path = addslashes($image['tmp_name']); //the name
        $file = file_get_contents($path);                 //the path mistaked wrong variable in very initial state
        $encodeFile = base64_encode($file);       //encoded as base64 and store to db
// echo '<img src="data:image/jpeg;base64,' . $encodeFile . '"/>';  //display the image in form of html
        $imageExist = true;
        $image = $encodeFile;
    }
}
if (!empty($name) && !empty($desc) && !empty($calories) && !empty($recommendTime)) {

    if ($imageExist == false) {
        $imageDirectory = "noimage.png";
        $image = base64_encode(file_get_contents($imageDirectory));
//  echo '<img src="data:image/jpeg;base64,'.$imageData.'"/>';
    }
    $newActivity = new activity("", $name, $image, $desc, $calories, $recommendTime);
    $facadeNewActivity = new facadeNewActivity($newActivity);
    $result = $facadeNewActivity->processNewActivity();
    $pathRedict = "activityList.php";
    if ($result > 0) {
        $message = "New Activity was created";
    } else {
        $message = "Problem occur during insert new activity";
    }
    $cf->messageAndRedict($message, $pathRedict);
}



