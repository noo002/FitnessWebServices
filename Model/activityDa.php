<?php

require_once 'Connection.php';

require_once 'activity.php';

class activityDa {

    public function getAllActivity() {
        $sqlSelected = "select * from activity";
        $conn = Connection::getInstance();
        $stmt = $conn->getDb()->prepare($sqlSelected);

        try {
            $stmt->execute();
            $a = array();

            foreach ($stmt->fetchAll() as $row) {
                $activity = new activity($row['activityId'], $row['name'], $row['image'], $row['description'], $row['caloriesBurnPerMin'], $row['suggestedDuration']);
                array_push($a, $activity);
            }
            return $a;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function registerNewActivity($activity) {
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewActivity(?,?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $name = $activity->name;
        $image = $activity->image;
        $desc = $activity->description;
        $cal = $activity->caloriesBurnPerMin;
        $duration = $activity->suggestedDuration;
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $image);
        $stmt->bindParam(3, $desc);
        $stmt->bindParam(4, $cal);
        $stmt->bindParam(5, $duration);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
//      this part is for take image testing for php encoding.
//    public function getImage() {
//        $conn = Connection::getInstance();
//        $sqlSelected = "select image from activity where name='1'";
//        $stmt = $conn->getDb()->prepare($sqlSelected);
//        try {
//            $stmt->execute();
//            foreach ($stmt->fetch() as $row) {
//                $result = $row;
//                break;
//            }
//            return $result;
//        } catch (Exception $ex) {
//            echo $ex->getMessage();
//        }
//    }

}
//
//$da = new activityDa();
//$result = $da->getImage();
//echo '<td><img src="data:image/jpeg;base64,' . $result . '"/></td>';
