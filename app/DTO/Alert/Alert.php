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
    public $icon = 'check_circle';
    public $message = '';

    /**
     * @return String $type
     */
    public function getType() {
        return $this->type;
    }

    /**
     * @param String $type
     * @return Alert
     */
    public function setType(String $type): self  {
        $this->type = $type;
        return $this;
    }

    /**
     * @return Alert
     */
    public function setSuccessType(): self  {
        $this->type = 'success';
        $this->icon = 'check_circle';
        return $this;
    }

    /**
     * @return Alert
     */
    public function setWarningType(): self  {
        $this->type = 'warning';
        $this->icon = 'warning';
        return $this;
    }

    /**
     * @return Alert
     */
    public function setDangerType(): self  {
        $this->type = 'danger';
        $this->icon = 'error_outline';
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * @param String $message
     * @return Alert
     */
    public function setMessage(String $message): self  {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon(): string
    {
        return $this->icon;
    }

    /**
     * @param string $icon
     * @return Alert
     */
    public function setIcon(string $icon): self
    {
        $this->icon = $icon;
        return $this;
    }
}
