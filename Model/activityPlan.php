<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of activityPlan
 *
 * @author Asus
 */
class activityPlan {

    private $description, $createAt, $trainerId;

    function __construct($description, $createAt, $trainerId) {
        $this->description = $description;
        $this->createAt = $createAt;
        $this->trainerId = $trainerId;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
