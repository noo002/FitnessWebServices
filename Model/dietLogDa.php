<?php

require_once 'Connection.php';
require_once 'dietLog.php';

class dietLogDa {

    public function registerNewDietLog($dietLog) {
        //private $type, $foodName, $quantity, $calories, $traineeId;
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewDietLog(?,?,?,?,?)";
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
            $result = array(
                "result" => $stmt->execute()
            );
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getDietLog($traineeId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getDietLog(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $traineeId);
        try {
            $stmt->execute();
            $result = array();
            if ($stmt->rowCount() > 0) {
                foreach ($stmt->fetchAll() as $row) {
                    $a = new dietLog($row['type'], $row['foodNme'], $row['quantity'], $row['calories'], $row['traineeId']);
                    array_push($result, $a);
                }
                return $result;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
