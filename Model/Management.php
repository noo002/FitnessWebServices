<?php

class Management {

    private $managementId, $name, $gender, $address, $email, $active;

    function __construct($managementId, $name, $gender, $address, $email, $active) {
        $this->managementId = $managementId;
        $this->name = $name;
        $this->gender = $gender;
        $this->address = $address;
        $this->email = $email;
        $this->active = $active;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }
    

}
