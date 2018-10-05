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
            foreach($stmt->fetchAll() as $row){
                $food = new food($row['foodId'], $row['name'], $row['type'], $row['barcode'], $row['protein'], $row['calories'], $row['fat'], $row['carbohydrate'], $row['messurement']);
                array_push($f, $food);
            }
            return $f;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
