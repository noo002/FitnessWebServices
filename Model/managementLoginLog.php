<?php

class managementLoginLog {

    private $managementId, $loginType;
    private $createAt;

    function __construct($managementId, $loginType) {
        $this->managementId = $managementId;
        $this->loginType = $loginType;
    }

    function setCreateAt($createAt) {
        $this->createAt = $createAt;
    }

    public function __get($property) {
        if (property_exists($this, $property)) {
            return $this->$property;
        }
    }

}
