<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of trainee
 *
 * @author Asus
 */
class trainee {

    private $name, $address, $gender, $birthdate, $email, $status;

    function __construct($name, $address, $gender, $birthdate, $email, $status) {
        $this->name = $name;
        $this->address = $address;
        $this->gender = $gender;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->status = $status;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}