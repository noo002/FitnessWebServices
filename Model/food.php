<?php

class food {

    private $foodId, $name, $type, $barcode, $protein, $calories, $fat, $carbohydrate, $meassurement;

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

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
