<?php

require_once 'Connection.php';
require_once 'feedback.php';

class feedbackDa {

    public function getAllFeedback($trainerId,$activityPlanId) {
        $sqlSelected = "call getAllFeedback(?,?)";
        $conn = Connection::getInstance();
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1,$trainerId);
        $stmt->bindParam(2,$activityPlanId);
        try {
            $stmt->execute();
            $result = array();
            foreach ($stmt->fetchAll() as $row) {
                $s = new feedback($row['description'], $row['rating']);
                $s->setFitnessId($row['fitnessId']);
                array_push($result, $s);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new feedbackDa();
//print_r($da->getAllFeedback(1,1));