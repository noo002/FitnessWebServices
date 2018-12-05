<?php

require_once 'Connection.php';

require_once 'food.php';

class foodDa {

    public function getAllFood() {
        $conn = Connection::getInstance();
        $sqlSelected = "select * from food";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->execute();
            $f = array();
            foreach ($stmt->fetchAll() as $row) {
                $food = new food($row['foodId'], $row['name'], $row['type'], $row['barcode'], $row['protein'], $row['calories'], $row['fat'], $row['carbohydrate'], $row['messurement']);
                $food->setFoodStatus($row['status']);
                array_push($f, $food);
            }
            return $f;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAllActiveFood() {
        $conn = Connection::getInstance();
        $sqlSelected = "call getAllActiveFood()";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->execute();
            $f = array();
            foreach ($stmt->fetchAll() as $row) {
                $food = new food($row['foodId'], $row['name'], $row['type'], $row['barcode'], $row['protein'], $row['calories'], $row['fat'], $row['carbohydrate'], $row['messurement']);
                $food->setFoodStatus($row['status']);
                array_push($f, $food);
            }
            return $f;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function registerNewFood($food) {
        $conn = Connection::getInstance();
        $sqlSelected = "call registerNewFood(?,?,?,?,?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $name = $food->name;
        $type = $food->type;
        $barcode = $food->barcode;
        $protein = $food->protein;
        $calories = $food->calories;
        $fat = $food->fat;
        $carbo = $food->carbohydrate;
        $measurement = $food->meassurement;
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $type);
        $stmt->bindParam(3, $barcode);
        $stmt->bindParam(4, $protein);
        $stmt->bindParam(5, $calories);
        $stmt->bindParam(6, $fat);
        $stmt->bindParam(7, $carbo);
        $stmt->bindParam(8, $measurement);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    private function getFoodStatus($foodId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getFoodStatus(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $foodId);
        try {
            $stmt->execute();
            foreach ($stmt->fetch() as $row) {
                $result = $row;
                break;
            }
            if ($result == 1) {
                $result = 2;
            } else if ($result == 2) {
                $result = 1;
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateStatus($foodId) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateFoodStatus(?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $foodStatus = $this->getFoodStatus($foodId);
        $stmt->bindParam(1, $foodStatus);
        $stmt->bindParam(2, $foodId);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getFoodDetail($foodId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getFoodDetail(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $foodId);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $food = new food($row['foodId'], $row['name'], $row['type'], $row['barcode'], $row['protein'], $row['calories'], $row['fat'], $row['carbohydrate'], $row['messurement']);
                $food->setFoodStatus($row['status']);
            }
            return $food;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateFoodDetail($food) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateFoodDetail(?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $foodId = $food->foodId;
        $foodName = $food->name;
        $foodType = $food->type;
        $barcode = $food->barcode;
        $protein = $food->protein;
        $calories = $food->calories;
        $fat = $food->fat;
        $carbo = $food->carbohydrate;
        $measurement = $food->meassurement;
        $stmt->bindParam(1, $foodId);
        $stmt->bindParam(2, $foodName);
        $stmt->bindParam(3, $foodType);
        $stmt->bindParam(4, $barcode);
        $stmt->bindParam(5, $protein);
        $stmt->bindParam(6, $calories);
        $stmt->bindParam(7, $fat);
        $stmt->bindParam(8, $carbo);
        $stmt->bindParam(9, $measurement);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getFoodName($foodId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getFoodName(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $foodId);
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

    public function barcodeSearch($barcode) {
        $conn = Connection::getInstance();
        $sqlSelected = "call barcodeSearch(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $barcode);
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

    public function getSearchFood($name) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getSearchFood(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $name);
        try {
            $stmt->execute();
            $result = array();
            foreach($stmt->fetchAll() as $row){
                $a = array(
                    'foodId' =>$row['foodId'],
                    'name'=>$row['name'],
                    'calories' =>$row['calories']
                );
                array_push($result, $a);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new foodDa();
//echo $result = $da->getFoodName(1);
//print_r($result);
