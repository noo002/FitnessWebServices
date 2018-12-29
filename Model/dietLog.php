<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dietLog
 *
 * @author Asus
 */
class dietLog implements JsonSerializable {

    private $type, $foodName, $quantity, $calories, $traineeId;

    function __construct($type, $foodName, $quantity, $calories, $traineeId) {
        $this->type = $type;
        $this->foodName = $foodName;
        $this->quantity = $quantity;
        $this->calories = $calories;
        $this->traineeId = $traineeId;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function jsonSerialize() {
        return [
            'traineeId' => $this->traineeId,
            'type' => $this->type,
            'foodName' => $this->foodName,
            'quantity' => $this->quantity,
            'calories' => $this->calories
        ];
    }

}
