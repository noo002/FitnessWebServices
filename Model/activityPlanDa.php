<?php

require_once 'Connection.php';
require_once 'activityPlan.php';

class activityPlanDa {

    private function getActivityPlanList($trainerId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getActivityPlanDietList(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        try {
            $stmt->execute();
            $result = array();
            foreach ($stmt->fetchAll() as $row) {
                $r = array(
                    "activityPlanId" => $row['activityPlanId'],
                    "description" => $row['description'],
                    "NumberFood" => $row['Total Diet'],
                    "NumberActivity" => ""
                );
                array_push($result, $r);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getActivityPlanActivity($trainerId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getActivityPlanActivityList(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        $result = $this->getActivityPlanList($trainerId);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row => $key) {
                $result[$row]['NumberActivity'] = $key['Total Activity'];
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAllActivityInList($trainerId, $activityPlanId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getSelectedActivityInList(?,?)";
        $result = $this->getAllActivity();
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        $stmt->bindParam(2, $activityPlanId);
        try {
            $stmt->execute();
            $s = array();
            foreach ($stmt->fetchAll() as $row) {
                $data = array(
                    "activityId" => $row['activityId']
                );
                array_push($s, $data);
            }
            foreach ($s as $row => $key) {
                foreach ($result as $x => $y) {
                    if ($key['activityId'] == $y['activityId']) {
                        $result[$x]['status'] = 1;
                    }
                }
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    private function getAllActivity() {
        $conn = Connection::getInstance();
        $sqlSelected = "call getAllActivityInList()";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $result = array();
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $data = array(
                    "activityId" => $row['activityId'],
                    "name" => $row['name'],
                    "caloriesburnpermin" => $row['caloriesburnpermin'],
                    "suggestedduration" => $row['suggestedduration'],
                    "totalCaloriesBurned" => $row['caloriesburnpermin'] * $row['suggestedduration'],
                    "status" => ""
                );
                array_push($result, $data);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getActivityPlanDescription($activityPlanId, $trainerId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getActivityPlanDescription(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $activityPlanId);
        $stmt->bindParam(2, $trainerId);

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

    public function registerActivityPlanDetail($activityId, $activityPlanId) {
        $conn = Connection::getInstance();
        $sqlInserted = "call registerActivityPlanDetail(?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $type = 1;
        $frequency = 3;
        $stmt->bindParam(1, $activityPlanId);
        $stmt->bindParam(2, $type);
        $stmt->bindParam(3, $activityId);
        $stmt->bindParam(4, $frequency);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteActivityPlanDetail($activityId, $activityPlanId) {
        $conn = Connection::getInstance();
        $sqlDeleted = "call deleteActivityPlanDetail(?,?)";
        $stmt = $conn->getDb()->prepare($sqlDeleted);
        $stmt->bindParam(1, $activityPlanId);
        $stmt->bindParam(2, $activityId);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function checkActivityInPlanDetail($activityId, $activityPlanId) {
        $result = false;
        $conn = Connection::getInstance();
        $sqlSelected = "call checkActivityInPlanDetail(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $activityId);
        $stmt->bindParam(2, $activityPlanId);
        try {
            $stmt->execute();
            foreach ($stmt->fetch() as $row) {
                if ($row == 1) {
                    $result = true;
                }
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        return $result;
    }

    private function getAllActiveFood() {
        $conn = Connection::getInstance();
        $sqlSelected = "call getFood()";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->execute();
            $result = array();
            foreach ($stmt->fetchAll() as $row) {
                $s = array(
                    "foodId" => $row['foodId'],
                    "name" => $row['name'],
                    "fat" => $row['fat'],
                    "protein" => $row['protein'],
                    "carbohydrate" => $row['carbohydrate'],
                    'calories' => $row['calories'],
                    "status" => ""
                );
                array_push($result, $s);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getActivityPlanFoodList($trainerId, $activityPlanId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getActivityPlanFoodList(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        $stmt->bindParam(2, $activityPlanId);
        $result = $this->getAllActiveFood();
        try {
            $stmt->execute();
            $r = array();
            foreach ($stmt->fetchAll() as $row) {
                $data = array(
                    "foodId" => $row['foodId']
                );
                array_push($r, $data);
            }
            foreach ($r as $row => $key) {
                for ($i = 0; $i < sizeof($result); $i++) {
                    if ($key['foodId'] == $result[$i]['foodId']) {
                        $result[$i]['status'] = 1;
                    }
                }
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function checkDietPlanDetail($activityPlanId, $foodId) {
        $result = false;
        $conn = Connection::getInstance();
        $sqlSelected = "call checkDietPlanDetail(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $activityPlanId);
        $stmt->bindParam(2, $foodId);
        try {
            $stmt->execute();
            foreach ($stmt->fetch() as $row) {
                if ($row == 1) {
                    $result = true;
                    break;
                }
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function registerNewDietPlanDetail($activityPlanId, $foodId) {
        $frequency = 2;
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewDietPlanDetail(?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $activityPlanId);
        $stmt->bindParam(2, $foodId);
        $stmt->bindParam(3, $frequency);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function deleteDietPlanDetail($activityPlanId, $foodId) {
        $conn = Connection::getInstance();
        $sqlDeleted = "call deleteDietPlanDetail(?,?)";
        $stmt = $conn->getDb()->prepare($sqlDeleted);
        $stmt->bindParam(1, $activityPlanId);
        $stmt->bindParam(2, $foodId);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function registerNewActivityPlan($desc, $trainerId) {
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewActivityPlan(?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $desc);
        $stmt->bindParam(2, $trainerId);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateActivityPlanDescription($activityPlanId, $desc) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateActivityPlanDescription(?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $stmt->bindParam(1, $desc);
        $stmt->bindParam(2, $activityPlanId);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    private function getAllActivityPlan() {
        $conn = Connection::getInstance();
        $sqlSelected = "call getAllActivityPlan()";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->execute();
            $result = array();
            foreach ($stmt->fetchAll() as $row) {
                $plan = array(
                    "activityPlanId" => $row['activityPlanId'],
                    "description" => $row['description'],
                    "status" => 0
                );
                array_push($result, $plan);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getTraineeActivityPlan($traineeId) {
        $conn = Connection::getInstance();
        $sqlSeleted = "call getTraineeActivityPlan(?)";
        $stmt = $conn->getDb()->prepare($sqlSeleted);
        $result = $this->getAllActivityPlan();
        $stmt->bindParam(1, $traineeId);
        try {
            $stmt->execute();
            if (sizeof($stmt->rowCount()) == 0) {
                echo "0";
            } else {
                foreach ($stmt->fetchAll() as $row) {
                    foreach ($result as $r => $key) {
                        if ($key['activityPlanId'] == $row['activityPlanId']) {
                            $result[$r]['status'] = 1;
                            break;
                        }
                    }
                    break;
                }
                return $result;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function checkAssignedPlan($traineeId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call checkAssignedPlan(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $traineeId);
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

    public function updateAssignPlan($activityPlanId, $traineeId) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateAssignPlan(?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $stmt->bindParam(1, $activityPlanId);
        $stmt->bindParam(2, $traineeId);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function registerNewAssignPlan($activityPlanId, $traineeId) {
        $sqlInserted = "call registerNewFitness(?,?)";
        $conn = Connection::getInstance();
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $activityPlanId);
        $stmt->bindParam(2, $traineeId);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAssignedActivity($traineeId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getAssignedActivity(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->bindParam(1, $traineeId);
            $stmt->execute();
            $result = array();
            if ($stmt->rowCount() > 0) {
                foreach ($stmt->fetchAll() as $row) {
                    $a = array(
                        'traineeId' => $row['traineeId'],
                        'activityId' => $row['activityId'],
                        'frequency' => $row['frequency'],
                        'description' => $row['description']
                    );
                    array_push($result, $a);
                }
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new activityPlanDa();
//$result =$da->getTraineeActivityPlan(2);
//foreach($result as $row){
//    echo   $row['activityPlanId']  ." = ".$row['status']."<br/>";
//}
//echo $result;
//print_r($result);
//foreach ($result as $row) {
//    echo $row['foodId'] . " = " . $row['status'] . "<br/>";
//}
