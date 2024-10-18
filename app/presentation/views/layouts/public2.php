<?php

namespace app\presentation\views\layouts;

class publicLayout {
    public function render($title, $content) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?php echo htmlspecialchars($title); ?></title>
            <link rel="stylesheet" href="/css/output.css">
        </head>
        <body>
            <?php include __DIR__ . '/../components/navigation/header.php'; ?>

            <main>
                <?php echo $content; ?>
            </main>

            <?php include __DIR__ . '/../components/navigation/footer.php'; ?>
        </body>
        </html>
        <?php
    }
}
