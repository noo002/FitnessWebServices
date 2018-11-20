<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of trainerLoginLog
 *
 * @author Asus
 */
class trainerLoginLog {

    private $loginType, $trainerId;
    private $createAt;

    function __construct($loginType, $trainerId) {
        $this->loginType = $loginType;
        $this->trainerId = $trainerId;
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
