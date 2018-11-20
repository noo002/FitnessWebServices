<?php

require_once '../../Model/foodDa.php';
require_once '../../Model/food.php';

class facadeNewFood {

    private $food;

    function __construct($food) {
        $this->food = $food;
    }

    private function getFood() {
        return $this->food;
    }

    public function processFood() {
        $result = $this->insertNewFood();
        return $result;
    }

    private function insertNewFood() {
        $da = new foodDa();
        $result = $da->registerNewFood($this->getFood());
        return $result;
    }

}
