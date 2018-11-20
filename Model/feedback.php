<?php

class feedback {

    private $fitnessId, $description, $rating;
    private $createAt;

    function setFitnessId($fitnessId) {
        $this->fitnessId = $fitnessId;
    }

    function setCreateAt($createAt) {
        $this->createAt = $createAt;
    }

    function __construct($description, $rating) {
        $this->description = $description;
        $this->rating = $rating;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
