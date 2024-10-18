<?php

namespace src\components\form;

class formInput {
    public $name;
    public $value;
    public $attributes;

    public function __construct($name, $value = '', $attributes = []) {
        $this->name = $name;
        $this->value = $value;
        $this->attributes = $attributes;
    }

    public function render() {
        $attributes = '';
        foreach ($this->attributes as $key => $value) {
            $attributes .= " $key=\"$value\"";
        }
        return "<input type=\"text\" name=\"$this->name\" value=\"$this->value\"$attributes>";
    }
}
