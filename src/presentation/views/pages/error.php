<?php
// Ensure you escape any values to prevent XSS attacks
$errorType = htmlspecialchars($errorData['type']);
$errorMessage = htmlspecialchars($errorData['message']);
$errorFile = htmlspecialchars($errorData['file']);
$errorLine = htmlspecialchars($errorData['line']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error: <?php echo $errorType; ?> - <?php echo $errorMessage; ?></title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f8f9fa; color: #343a40; padding: 20px; }
        h1 { color: #dc3545; }
        pre { background-color: #e9ecef; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <h1><?php echo $errorType; ?>: <?php echo $errorMessage; ?></h1>
    <p><strong>File:</strong> <?php echo $errorFile; ?> <strong>Line:</strong> <?php echo $errorLine; ?></p>
    <h3>Stack Trace:</h3>
    <pre>
        <?php echo print_r($errorData['trace'], true); ?>
    </pre>
</body>
</html>
