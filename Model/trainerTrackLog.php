<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of trainerTrackLog
 *
 * @author Asus
 */
class trainerTrackLog {

    private $trainerId, $activityPerformed;
    private $createAt;

    function __construct($trainerId, $activityPerformed) {
        $this->trainerId = $trainerId;
        $this->activityPerformed = $activityPerformed;
    }

    function setCreateAt($createAt) {
        $this->createAt = $createAt;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
