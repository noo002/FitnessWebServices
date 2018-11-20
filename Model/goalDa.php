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
}

//$da = new goalDa();
//$result = $da->getTraineeGoalDetail(2);
//print_r($result);
