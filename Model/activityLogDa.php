<?php

//require_once 'Connection.php';
//require_once '../Model/activityLog.php';

require_once 'Connection.php';
require_once 'activityLog.php';

class activityLogDa {

    public function registerNewActivityLog($activityLog) {
        //    private $type, $description, $duration, $distance, $traineeId;
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewActivitylog(?,?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $type = $activityLog->type;
        $description = $activityLog->description;
        $duration = $activityLog->duration;
        $distance = $activityLog->distance;
        $traineeId = $activityLog->traineeId;
        $stmt->bindParam(1, $type);
        $stmt->bindParam(2, $description);
        $stmt->bindParam(3, $duration);
        $stmt->bindParam(4, $distance);
        $stmt->bindParam(5, $traineeId);
        try {
            $result = array(
                "result" =>$stmt->execute()
            );
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$activityLog = new activityLog(1, 1, 222, 5.221, 1);
//$da = new activityLogDa();
//$result = $da->registerNewActivityLog($activityLog);
