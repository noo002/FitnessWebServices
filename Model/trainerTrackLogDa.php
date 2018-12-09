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

    public function getTrainerPastTrackLog() {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainerPastTrackLog()";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->execute();
            $result = array();
            foreach ($stmt->fetchAll() as $row => $key) {
                $a = array(
                    'trainerTrackLogId' => $key['trainerTrackLogId']
                );
                array_push($result, $a);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deletePastTrackLog($id) {
        $conn = Connection::getInstance();
        $sqlDeleted = "call deletePastTrackLog(?)";
        $stmt = $conn->getDb()->prepare($sqlDeleted);
        try {
            $stmt->bindParam(1, $id);
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
