<?php

namespace App\DTO\Alert;

/**
 * Class Alert
 * DTO for alert message to user
 * @package App\DTO\Alert
 */
class Alert
{
    public $type = 'success';
    public $message = '';

    /**
     * @return String $type
     */
    public function getType() {
    	$this->type = 'success';
    }

    /**
     * @param String $type
     * @return String
     */
    public function setType(String $type) {
    	return $this->type = $type;
    }

    /**
     * @return string
     */
    public function setSuccessType() {
    	return $this->type = 'success';
    }

    /**
     * @return string
     */
    public function setWarningType() {
    	return $this->type = 'warning';
    }

    /**
     * @return string
     */
    public function setDangerType() {
    	return $this->type = 'danger';
    }

    /**
     * @return string
     */
    public function getMessage() {
    	return $this->message;
    }

    /**
     * @param String $message
     * @return String
     */
    public function setMessage(String $message) {
        return $this->message = $message;
    }
}
