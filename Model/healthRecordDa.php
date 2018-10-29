<?php

require_once '../Model/healthRecord.php';
require_once 'Connection.php';

class healthRecordDa {

    public function getCurrentHealthRecord($traineeId) {
        $sqlSelected = "call getCurrentHealthRecord(?)";
        $conn = Connection::getInstance();
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $traineeId);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $result = new healthRecord($traineeId, $row['weight'], $row['height'], $row['createAt']);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getTraineeAllHealthRecord($traineeId) {
        $sqlSelected = "call getTraineeAllHealthRecord(?)";
        $conn = Connection::getInstance();
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1,$traineeId);
        $result = array();
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $healthRecord = new healthRecord($traineeId, $row['weight'], $row['height'], $row['createAt']);
                array_push($result, $healthRecord);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new healthRecordDa();
//$result = $da->getTraineeAllHealthRecord(2);
// echo sizeof($result);