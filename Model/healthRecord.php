<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of healthRecor
 *
 * @author Asus
 */
class healthRecord implements JsonSerializable {

    private $healthRecordId, $traineeId, $weight, $height, $description, $createAt;

    function __construct($traineeId, $weight, $height, $createAt) {
        $this->traineeId = $traineeId;
        $this->weight = $weight;
        $this->height = $height;
        $this->createAt = $createAt;
    }

    function setHealthRecordId($healthRecordId) {
        $this->healthRecordId = $healthRecordId;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function jsonSerialize() {
        return [
            'weight' => $this->weight,
            'height' => $this->height,
            'createAt' => $this->createAt
        ];
    }

}
