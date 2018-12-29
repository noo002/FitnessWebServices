<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of activityLog
 *
 * @author Asus
 */
class activityLog {

    private $type, $description, $duration, $distance, $traineeId;

    function __construct($type, $description, $duration, $distance, $traineeId) {
        $this->type = $type;
        $this->description = $description;
        $this->duration = $duration;
        $this->distance = $distance;
        $this->traineeId = $traineeId;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
