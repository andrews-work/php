<?php
function renderTemplate($templatePath, $data = []) {
    extract($data);
    include $templatePath;
}
?>
