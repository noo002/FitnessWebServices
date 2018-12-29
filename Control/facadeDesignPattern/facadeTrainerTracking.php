<?php

//require_once '../../Model/trainerTrackLog.php';
//require_once '../../Model/trainerTrackLogDa.php';

require_once '../../Model/trainerTrackLog.php';
require_once '../../Model/trainerTrackLogDa.php';

class facadeTrainerTracking {

    private $trainerTrackLog;

    function __construct($trainerTrackLog) {
        $this->trainerTrackLog = $trainerTrackLog;
    }

    public function processTrackLog() {
        $this->insertNewTrackLog();
    }

    private function insertNewTrackLog() {
        $result = false;
        $da = new trainerTrackLogDa();
        $result = $da->registerNewTrainerTrackLog($this->trainerTrackLog->trainerId, $this->trainerTrackLog->activityPerformed);
        return $result;
    }

}
