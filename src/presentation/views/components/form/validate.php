<?php

namespace src\components\form;

class formValidate {
    public $rules;

    public function __construct($rules) {
        $this->rules = $rules;
    }

    public function validate($data) {
        // Implement your validation logic here
        // For simplicity, let's assume it returns an array of errors
        return [];
    }
}
