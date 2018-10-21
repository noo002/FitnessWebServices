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

    private $name, $address, $gender, $birthdate, $email, $experience, $certificate;
    private $id, $status;

    function __construct($name, $address, $gender, $birthdate, $email, $experience, $certificate) {
        $this->name = $name;
        $this->address = $address;
        $this->gender = $gender;
        $this->birthdate = $birthdate;
        $this->email = $email;
        $this->experience = $experience;
        $this->certificate = $certificate;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
