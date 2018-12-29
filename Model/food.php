<?php

class food implements JsonSerializable {

    private $foodId, $name, $type, $barcode, $protein, $calories, $fat, $carbohydrate, $meassurement;
    private $foodStatus, $unitOfMeasurement;

    function __construct($foodId, $name, $type, $barcode, $protein, $calories, $fat, $carbohydrate, $meassurement) {
        $this->foodId = $foodId;
        $this->name = $name;
        $this->type = $type;
        $this->barcode = $barcode;
        $this->protein = $protein;
        $this->calories = $calories;
        $this->fat = $fat;
        $this->carbohydrate = $carbohydrate;
        $this->meassurement = $meassurement;
    }

    function setUnitOfMeasurement($unitOfMeasurement) {
        $this->unitOfMeasurement = $unitOfMeasurement;
    }

    function setFoodStatus($foodStatus) {
        $this->foodStatus = $foodStatus;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function jsonSerialize() {
        return
                [
                    'name' => $this->name,
                    'calories' => $this->calories,
                    'protein' => $this->protein,
                    'fat' => $this->fat,
                    'carbohydrate' => $this->carbohydrate
        ];
    }

}
