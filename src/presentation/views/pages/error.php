<?
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="flex items-center justify-center min-h-screen bg-gray-50">
        <!-- Adjust width to be centered, and ensure there's padding -->
        <div class="w-full p-8 space-y-6 bg-white rounded-lg shadow-lg max-w-7xl">

            <!-- Error Title with Color Coding -->
            <section class="text-center">
                <h1 class="mb-2 text-4xl font-extrabold 
                    <?php echo ($errorType === 'Error') ? 'text-red-600' : 
                               ($errorType === 'Warning' ? 'text-yellow-600' : 
                               ($errorType === 'Info' ? 'text-blue-600' : 'text-gray-600')); ?>">
                    <?php echo $errorType; ?>
                </h1>
                <p class="text-xl text-gray-700"><?php echo $errorMessage; ?></p>
            </section>

            <!-- Error Details Section with Dynamic Background -->
            <section class="space-y-4">
                <div class="flex justify-between p-4 
                    <?php echo ($errorType === 'Error') ? 'bg-red-100' : 
                               ($errorType === 'Warning' ? 'bg-yellow-100' : 
                               ($errorType === 'Info' ? 'bg-blue-100' : 'bg-gray-100')); ?> rounded-md">
                    <p><strong class="font-semibold">File:</strong> <?php echo $errorFile; ?></p>
                    <p><strong class="font-semibold">Line:</strong> <?php echo $errorLine; ?></p>
                </div>

                <!-- Stack Trace Section -->
                <div class="p-6 rounded-lg shadow-sm 
                    <?php echo ($errorType === 'Error') ? 'bg-red-50' : 
                               ($errorType === 'Warning' ? 'bg-yellow-50' : 
                               ($errorType === 'Info' ? 'bg-blue-50' : 'bg-gray-50')); ?>">
                    <h3 class="mb-4 text-2xl font-semibold text-gray-800">Stack Trace:</h3>
                    <pre class="p-4 overflow-auto font-mono text-sm 
                    <?php echo ($errorType === 'Error') ? 'text-red-700 bg-red-100' : 
                               ($errorType === 'Warning' ? 'text-yellow-700 bg-yellow-100' : 
                               ($errorType === 'Info' ? 'text-blue-700 bg-blue-100' : 'text-gray-700 bg-gray-300')); ?> rounded-lg">
                        <?php echo print_r($errorData['trace'], true); ?>
                    </pre>
                </div>
            </section>

            <!-- Optional Footer/Debug Information -->
            <section class="mt-6 text-sm text-center text-gray-500">
                <p>If you're unsure about the error, please contact the developer.</p>
            </section>

        </div>
    </section>
</body>
</html>
