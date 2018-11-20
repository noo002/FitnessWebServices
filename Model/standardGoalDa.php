<?php

require_once 'Connection.php';

//require_once '../Model/standardGoal.php';

class standardGoalDa {

    public function getAllStandardGoal() {
        $sqlSelected = "call getAllGoal()";
        $conn = Connection::getInstance();
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->execute();
            $result = array();
            foreach ($stmt->fetchAll() as $row) {
                $standardGoal = new standardGoal($row['goalName'], $row['createAt'], $row['foodIntake'], $row['activityDuration']);
                $standardGoal->setStandardGoalId($row['standardGoalId']);
                array_push($result, $standardGoal);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function registerNewStandardGoal($standardGoal) {
        $goalName = $standardGoal->goalName;
        $foodIntake = $standardGoal->foodIntake;
        $activityDuration = $standardGoal->activityDuration;
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewStandardGoal(?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $goalName);
        $stmt->bindParam(2, $foodIntake);
        $stmt->bindParam(3, $activityDuration);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getStandardGoalDetail($standardGoalId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getStandardGoalDetail(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $standardGoalId);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $result = new standardGoal($row['goalName'], "", $row['foodIntake'], $row['activityDuration']);
                $result->setStandardGoalId($row['standardGoalId']);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateStandardGoal($standardGoal) {
        $goalName = $standardGoal->goalName;
        $foodIntake = $standardGoal->foodIntake;
        $activityDuration = $standardGoal->activityDuration;
        $standardGoalId = $standardGoal->standardGoalId;
        $conn = Connection::getInstance();
        $sqlInserted = "call updateStandardGoal(?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $goalName);
        $stmt->bindParam(2, $foodIntake);
        $stmt->bindParam(3, $activityDuration);
        $stmt->bindParam(4, $standardGoalId);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new standardGoalDa();
//print_r($da->getAllStandardGoal());