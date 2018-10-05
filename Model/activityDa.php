<?php

require_once 'Connection.php';
//require_once './activity.php';

class activityDa {

    public function getAllActivity() {
        $sqlSelected = "select * from activity";
        $conn = Connection::getInstance();
        $stmt = $conn->getDb()->prepare($sqlSelected);

        try {
            $stmt->execute();
            $a = array();
            
            foreach($stmt->fetchAll() as $row){
            $activity = new activity($row['activityId'], $row['name'], $row['image'], $row['description'], $row['caloriesBurnPerMin'], $row['suggestedDuration']);
            array_push($a, $activity);
            }
            return $a;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
