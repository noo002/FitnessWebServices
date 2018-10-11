<?php

require_once 'Connection.php';

//require_once 'food.php';

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

}
