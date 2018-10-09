<?php

$imageExist = false;
$image = $_FILES['fileToUpload'];
if (!empty($image['tmp_name'])) {
    if (getimagesize($image['tmp_name'], $image['name']) == false) {
        $message = "Please upload an image";
        $cf->messageAndRedict($message, $pathRedict);
    } else {
        $path = addslashes($image['tmp_name']); //the name
        $file = file_get_contents($path);                 //the path mistaked wrong variable in very initial state
        $encodeFile = base64_encode($file);       //encoded as base64 and store to db
        echo '<img src="data:image/jpeg;base64,' . $encodeFile . '"/>';  //display the image in form of html
        $imageExist = true;
    }
}
