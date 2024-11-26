<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up & Login Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900 font-sans">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <div class="form-container" id="login-form">
            <form method="POST" action="login.php">
                <label class="text-2xl font-bold text-gray-700 mb-4 block">Login</label>
                <input type="email" id="login-email" name="Email" placeholder="Email" required
                    class="w-full p-3 mb-4 border border-gray-300 rounded">
                <input type="password" id="login-password" name="Password" placeholder="Password" required
                    class="w-full p-3 mb-4 border border-gray-300 rounded">
                <button type="submit" name="log_user"
                    class="w-full p-3 bg-blue-500 text-white font-bold rounded hover:bg-blue-600 transition duration-300">Login</button>
                <div class="text-blue-500 text-center mt-4 cursor-pointer font-bold hover:text-blue-700"
                    onclick="window.location.href='register.php'">Don't have an account? Sign up</div>
            </form>
        </div>
    </div>
</body>

</html>
