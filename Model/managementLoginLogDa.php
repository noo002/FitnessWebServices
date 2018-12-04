<?php

require_once '../Model/managementLoginLog.php';
require_once 'Connection.php';
require_once '../Model/managementLoginDa.php';

class managementLoginLogDa {

    public function insertNewloginLog($managementLoginLog) {
        $conn = Connection::getInstance();
        $sqlInserted = "call insertNewloginLog(?,?)";
        $loginType = $managementLoginLog->loginType;
        $managementId = $managementLoginLog->managementId;
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $managementId);
        $stmt->bindParam(2, $loginType);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getManagementLoginLog($email) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getManagementLoginLog(?)";
        try {
            $managementDa = new managementLoginDa();
            $managementId = $managementDa->getManagementId($email);
            $stmt = $conn->getDb()->prepare($sqlSelected);
            $stmt->bindParam(1, $managementId);
            $stmt->execute();
            $log = array();
            foreach ($stmt->fetchAll() as $row) {
                $loginLog = new managementLoginLog($row['managementId'], $row['loginType']);
                $loginLog->setCreateAt($row['createAt']);
                array_push($log, $loginLog);
            }
            return $log;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getLastSuccessfulLogin($email) {
        $sqlSelected = "call getLastSuccessfulLoginDate(?)";
        $conn = Connection::getInstance();
        try {
            $managementDa = new managementLoginDa();
            $managementId = $managementDa->getManagementId($email);
            $stmt = $conn->getDb()->prepare($sqlSelected);
            $stmt->bindParam(1, $managementId);
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $result = $row['createAt'];
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getLastUnsuccessfulLog($email) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getLastUnsuccessfulLogin(?)";
        $managementDa = new managementLoginDa();
        $managementId = $managementDa->getManagementId($email);
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $managementId);
        $log = array();
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $loginLog = new managementLoginLog($row['managementId'], $row['loginType']);
                $loginLog->setCreateAt($row['createAt']);
                array_push($log, $loginLog);
            }
            return $log;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getLastUnsuccessfulDate($email) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getLastUnsuccessfulDate(?)";
        $managementDa = new managementLoginDa();
        $managementId = $managementDa->getManagementId($email);
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $managementId);
        try {
            $stmt->execute();
            foreach ($stmt->fetch() as $row) {
                $result = $row;
                break;
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getManagementPast() {
        $conn = Connection::getInstance();
        $sqlSelected = " call getManagementPast()";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $result = array();
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $a = array(
                    "managementLoginLogId" => $row['managementLoginLogId'],
                );
                array_push($result, $a);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteManagementLog($managementLogId) {
        $conn = Connection::getInstance();
        $sqlDeleted = "call deleteManagementLog(?)";
        $stmt = $conn->getDb()->prepare($sqlDeleted);
        $stmt->bindParam(1, $managementLogId);
        try {
            $stmt->execute();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

$da = new managementLoginLogDa();
$da->deleteManagementLog(6);
//$result = $da->getManagementPast();
//foreach($result as $row){
//    echo $row['managementLoginLogId']."<br/>";
//}
