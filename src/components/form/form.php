<?php

namespace src\components\form;

class formComponent {
    public $inputs = [];
    public $labels = [];
    public $errors = [];
    public $validator;

    public function __construct($inputs, $labels, $validator) {
        $this->inputs = $inputs;
        $this->labels = $labels;
        $this->validator = $validator;
    }

    public function render() {
        $html = '';
        foreach ($this->labels as $label) {
            $html .= $label->render();
        }
        foreach ($this->inputs as $input) {
            $html .= $input->render();
        }
        foreach ($this->errors as $error) {
            $html .= $error->render();
        }
        return $html;
    }

    public function validate($data) {
        $this->errors = $this->validator->validate($data);
    }
}
