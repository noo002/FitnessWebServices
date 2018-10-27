<?php

class managementLoginLog {

    private $managementId, $loginType;

    function __construct($managementId, $loginType) {
        $this->managementId = $managementId;
        $this->loginType = $loginType;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
