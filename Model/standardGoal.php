<?php

class standardGoal implements JsonSerializable {

    public function jsonSerialize() {
        return [
          'standardGoalId'  => $this->standardGoalId,
            'goalName' =>$this->goalName,
            'createAt' =>$this->creatAt,
            'foodIntake' => $this->foodIntake,
            'activityDuration' =>$this->activityDuration
        ];
    }

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
