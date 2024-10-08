<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="/css/output.css">
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold">Register</h1>
        <form action="/register" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" id="username" name="username" class="w-full px-3 py-2 border rounded">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full px-3 py-2 border rounded">
            </div>
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Register</button>
        </form>
    </div>
    <script type="module" src="/js/main.js"></script>
</body>
</html>
