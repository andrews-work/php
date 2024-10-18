<?php

namespace src\components\form;

class formError {
    public $message;

    public function __construct($message) {
        $this->message = $message;
    }

    public function render() {
        return "<div class=\"error\">$this->message</div>";
    }
}
