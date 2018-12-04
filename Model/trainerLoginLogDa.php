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

    public function getTrainerLoginLog() {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainerLoginLog()";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->execute();
            $result = array();
            foreach ($stmt->fetchAll() as $row) {
                $a = array(
                    "trainerLoginLogId" => $row['trainerLoginLogId']
                );
                array_push($result, $a);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteTrainerLog($trainerLoginLogId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call deleteTrainerLog(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerLoginLogId);
        try {
            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new trainerLoginLogDa();
//$result = $da->getTrainerLoginLog();
//foreach ($result as $row) {
//    echo $row['trainerLoginLogId'] . "<br/>";
//}
//echo $a;
//print_r($a);