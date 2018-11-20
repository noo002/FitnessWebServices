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
                $activity->setStatus($row['status']);
                array_push($a, $activity);
            }
            return $a;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAllActiveActivity() {
        $sqlSelected = "call getAllActiveActivity()";
        $conn = Connection::getInstance();
        $stmt = $conn->getDb()->prepare($sqlSelected);

        try {
            $stmt->execute();
            $a = array();

            foreach ($stmt->fetchAll() as $row) {
                $activity = new activity($row['activityId'], $row['name'], $row['image'], $row['description'], $row['caloriesBurnPerMin'], $row['suggestedDuration']);
                $activity->setStatus($row['status']);
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

    private function getActivityStatus($activityId) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call getActivityStatus(?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $stmt->bindParam(1, $activityId);
        try {
            $stmt->execute();
            foreach ($stmt->fetch() as $row) {
                $result = $row;
                break;
            }
            if ($result == 1) {
                $result = 2;
            } else {
                $result = 1;
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateActivityStatus($activityId) {
        $conn = Connection::getInstance();
        $status = $this->getActivityStatus($activityId);
        $sqlUpdated = "call updateActivityStatus(?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $stmt->bindParam(1, $activityId);
        $stmt->bindParam(2, $status);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getActivityDetail($activityId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getActivityDetail(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $activityId);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $activity = new activity($row['activityId'], $row['name'], $row['image'], $row['description'], $row['caloriesBurnPerMin'], $row['suggestedDuration']);
            }
            return $activity;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateActivityDetail($activity) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateActivity(?,?,?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $activityId = $activity->activityId;
        $name = $activity->name;
        $image = $activity->image;
        $description = $activity->description;
        $calories = $activity->caloriesBurnPerMin;
        $suggestedDuration = $activity->suggestedDuration;
        $stmt->bindParam(1, $activityId);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $image);
        $stmt->bindParam(4, $description);
        $stmt->bindParam(5, $calories);
        $stmt->bindParam(6, $suggestedDuration);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getActivityName($activityId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getActivityName(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $activityId);
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
//echo $result = $da->updateActivityStatus(1);

//$result = $da->getImage();
//echo '<td><img src="data:image/jpeg;base64,' . $result . '"/></td>';
