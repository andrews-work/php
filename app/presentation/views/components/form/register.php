<?php

use src\components\form\formInput;
use src\components\form\formLabel;
use src\components\form\formComponent;

// Create form components
$inputUsername = new formInput('username', '', ['class' => 'form-control']);
$labelUsername = new formLabel('username', 'Username');

$inputEmail = new formInput('email', '', ['class' => 'form-control']);
$labelEmail = new formLabel('email', 'Email');

$inputPassword = new formInput('password', '', ['class' => 'form-control', 'type' => 'password']);
$labelPassword = new formLabel('password', 'Password');

// Create form component
$form = new formComponent([$inputUsername, $inputEmail, $inputPassword], [$labelUsername, $labelEmail, $labelPassword]);

echo $form->render();
?>

<form method="POST" action="/submit-form">
    <?php echo $form->render(); ?>
    <button type="submit">Submit</button>
</form>
