<?php

class goal {

    private $goalId, $traineeId, $type, $description, $due, $standardGoalId;

    function __construct($traineeId, $type, $description) {
        $this->traineeId = $traineeId;
        $this->type = $type;
        $this->description = $description;
    }

    function setGoalId($goalId) {
        $this->goalId = $goalId;
    }

    function setDue($due) {
        $this->due = $due;
    }

    function setStandardGoalId($standardGoalId) {
        $this->standardGoalId = $standardGoalId;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
