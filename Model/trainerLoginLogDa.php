<?php

require_once 'Connection.php';
require_once 'trainerLoginLog.php';
//require_once '../Model/trainerLoginLog.php';  

class trainerLoginLogDa {

    //    private $loginType, $trainerId;

    public function insertTrainerLoginLog($trainerLoginLog) {
        $trainerId = $trainerLoginLog->trainerId;
        $loginType = $trainerLoginLog->loginType;
        $sqlInserted = "call registerNewTrainerLoginLog(?,?)";
        $conn = Connection::getInstance();
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $trainerId);
        $stmt->bindParam(2, $loginType);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getLoginLogDetail($trainerId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainerLoginLogDetail(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        try {
            $log = array();
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $loginLog = new trainerLoginLog($row['loginType'], $row['trainerId']);
                $loginLog->setCreateAt($row['createAt']);
                array_push($log, $loginLog);
            }
            return $log;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getLastLoginDate($trainerId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainerLastLoginDate(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $result = $row['createAt'];
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getUnsuccessfulLoginLog($trainerId) {
        $conn = Connection::getInstance();
        $sqlSelected = "Call getTrainerUnsuccessfulLog(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        try {
            $log = array();
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $loginLog = new trainerLoginLog($row['loginType'], $row['trainerId']);
                $loginLog->setCreateAt($row['createAt']);
                array_push($log, $loginLog);
            }
            return $log;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getLastUnsuccessfulLoginDate($trainerId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getLastTrainerUnsuccessfulLoginDate(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        try {
            $stmt->execute();
              foreach ($stmt->fetchAll() as $row) {
                $result = $row['createAt'];
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new trainerLoginLogDa();
//$a = $da->getLastLoginDate(1);
//echo $a;
//print_r($a);