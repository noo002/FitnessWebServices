<?php

class commonFunction {

    public function checkEmailFormat($email) {
        $result = false;
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        return $result;
    }

    public function checkImageFileExtension($image) {
        $allowed = array('gif', 'PNG', 'jpg', 'jpeg');
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $result = false;
        if (in_array($ext, $allowed)) {
            $result = true;
        }
        return $result;
    }

    public function messageAndRedict($message, $path) {
        echo "<script>"
        . "alert('$message');window.location.href='$path'"
        . "</script>";
    }

    public function message($message) {
        echo "<script>alert('$message')</script>";
    }
    public function redicrect($path){
        echo "<script>window.location.href='$path';</script>";
    }

}
