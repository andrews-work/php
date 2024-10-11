<?php

namespace src\components\form;

class formLabel {
    public $for;
    public $text;

    public function __construct($for, $text) {
        $this->for = $for;
        $this->text = $text;
    }

    public function render() {
        return "<label for=\"$this->for\">$this->text</label>";
    }
}
