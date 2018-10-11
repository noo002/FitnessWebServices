<?php

require_once '../Model/activity.php';
require_once '../Model/activityDa.php';
require_once 'CommonFunction.php';

class facadeNewActivity {

    private $activity;

    function __construct($activity) {
        $this->activity = $activity;
    }

    public function processNewActivity() {

        $result = $this->insertNewActivity();
        $cf = new commonFunction();
        $path = "activityList.php";
        return $result;
    }

    function getActivity() {
        return $this->activity;
    }

    private function insertNewActivity() {
        $da = new activityDa();
        $result = $da->registerNewActivity($this->activity);
        return $result;
    }

}

//$activity = new activity("", "Badminton", "", "1", "2", "3");
//$facadeNewActivity = new facadeNewActivity($activity);
//$facadeNewActivity->processNewActivity();