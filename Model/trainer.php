<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of trainer
 *
 * @author Asus
 */
class trainer {

    private $name, $gender, $email, $experience, $certificate, $status;

    function __construct($name, $gender, $email, $experience, $certificate, $status) {
        $this->name = $name;
        $this->gender = $gender;
        $this->email = $email;
        $this->experience = $experience;
        $this->certificate = $certificate;
        $this->status = $status;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
