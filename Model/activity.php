<?php

class activity implements JsonSerializable {

    private $activityId, $name, $image, $description, $caloriesBurnPerMin, $suggestedDuration;
    private $status;

    function __construct($activityId, $name, $image, $description, $caloriesBurnPerMin, $suggestedDuration) {
        $this->activityId = $activityId;
        $this->name = $name;
        $this->image = $image;
        $this->description = $description;
        $this->caloriesBurnPerMin = $caloriesBurnPerMin;
        $this->suggestedDuration = $suggestedDuration;
    }

    function setImage($image) {
        $this->image = $image;
    }

    function setStatus($status) {
        $this->status = $status;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function jsonSerialize() {
        return [
            'activityId'=>$this->activityId,
            'name' =>$this->name,
            'image'=>$this->image,
            'description' =>$this->description,
            'caloriesBurnPerMin' =>$this->caloriesBurnPerMin,
            'suggestedDuration' =>$this->suggestedDuration
        ];
    }

}
