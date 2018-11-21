<?php

require_once 'trainerTrackLog.php';
require_once 'Connection.php';

class trainerTrackLogDa {

    public function registerNewTrainerTrackLog($trainerId, $activitesPerformed) {
        $conn = Connection::getInstance();
        $sqlSelected = "call registerNewTrainerTrackLog(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        $stmt->bindParam(2, $activitesPerformed);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getTrainerTrackLog($trainerId, $activitesPerformed) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainerTrackLog(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        $stmt->bindParam(2, $activitesPerformed);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $result = $row['Total'];
                break;
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

