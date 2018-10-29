<?php

class standardGoal {

    private $standardGoalId, $goalName, $creatAt, $foodIntake, $activityDuration;

    function __construct($goalName, $creatAt, $foodIntake, $activityDuration) {
        $this->goalName = $goalName;
        $this->creatAt = $creatAt;
        $this->foodIntake = $foodIntake;
        $this->activityDuration = $activityDuration;
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
