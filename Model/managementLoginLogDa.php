<?php

require_once '../Model/managementLoginLog.php';
require_once 'Connection.php';

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

}
