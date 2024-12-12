<?

namespace framework\presentation\views\components;

class form {

    // Render a simple label for the input field
    public function label($name) {
        return "<label for='$name'>" . ucfirst($name) . "</label>";
    }

    // Render the input field with optional error class
    public function input($name, $type = 'text', $placeholder = '') {
        return "
            <div class='form-group'>
                <input name='$name' type='$type' id='$name' placeholder='$placeholder' />
            </div>
        ";
    }
}
