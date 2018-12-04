<?php

require_once 'Connection.php';
require_once 'dieLog.php';

class dietLogDa {

    public function registerNewDietLog($dietLog) {
        //private $type, $foodName, $quantity, $calories, $traineeId;
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewDietLog(?)";
        $type = $dietLog->type;
        $foodName = $dietLog->foodName;
        $quantity = $dietLog->quantity;
        $calories = $dietLog->calories;
        $traineeId = $dietLog->traineeId;

        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $type);
        $stmt->bindParam(2, $foodName);
        $stmt->bindParam(3, $quantity);
        $stmt->bindParam(4, $calories);
        $stmt->bindParam(5, $traineeId);
        try {
            $result = $stmt->execut();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
