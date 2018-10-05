<?php

class activity {

    private $activityId, $name, $image, $description, $caloriesBurnPerMin, $suggestedDuration;

    function __construct($activityId, $name, $image, $description, $caloriesBurnPerMin, $suggestedDuration) {
        $this->activityId = $activityId;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->caloriesBurnPerMin = $caloriesBurnPerMin;
        $this->suggestedDuration = $suggestedDuration;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
