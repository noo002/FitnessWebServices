<?php

require_once 'Connection.php';

//require_once '../Model/goal.php';

class goalDa {

    //put your code here
    public function getTraineeGoalDetail($traineeId) {
        $conn = Connection::getInstance();
        $sqlSelected = " call getTraineeGoalDetail(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $traineeId);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $result = array(
                    "goalName" => $row['goalName'],
                    "description" => $row['description'],
                    "measurement" => $row['measurement']
                );
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function registerNewGoal($traineeId, $type, $description, $standardGoalId, $measurement) {
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewGoal(?,?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $traineeId);
        $stmt->bindParam(2, $type);
        $stmt->bindParam(3, $description);
        $stmt->bindParam(4, $standardGoalId);
        $stmt->bindParam(5, $measurement);
        try {
            $result = array(
                'result' => $stmt->execute()
            );
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateGoal($traineeId, $type, $description, $standardGoalId, $measurement) {
        $conn = Connection::getInstance();
        $sqlInserted = "call updateGoal(?,?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $traineeId);
        $stmt->bindParam(2, $type);
        $stmt->bindParam(3, $description);
        $stmt->bindParam(4, $standardGoalId);
        $stmt->bindParam(5, $measurement);
        try {
            $result = array(
                'result' => $stmt->execute()
            );
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getGoal($traineeId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getGoal(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $traineeId);
        try {
            $stmt->execute();
            $result = array();
            if ($stmt->rowCount() > 0) {
                foreach ($stmt->fetchAll() as $row) {
                    $goal = new goal($row['traineeId'], $row['type'], $row['description']);
                    $goal->setGoalId($row['goalId']);
                    $goal->setStandardGoalId($row['standardGoalId']);
                    array_push($result, $goal);
                }
                return $result;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getTotalStandardGoal() {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTotalStandardGoal()";
        $stmt = $conn->getDb()->prepare($sqlSelected);
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

}

//$da = new goalDa();
//$result = $da->getTraineeGoalDetail(2);
//print_r($result);
