<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-900 font-sans">
    <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
        <form method="POST" action="signup.php">
            <h2 class="text-2xl font-bold text-gray-700 mb-6">Create an Account</h2>

            <!-- Error Message Section -->
            <?php if (isset($_GET['error'])): ?>
                <p class="text-red-500 text-sm mb-4"><?php echo htmlspecialchars($_GET['error']); ?></p>
            <?php endif; ?>

            <!-- Username Field -->
            <div class="mb-4">
                <label class="block text-gray-600 font-bold mb-2" for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter your username" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Email Field -->
            <div class="mb-4">
                <label class="block text-gray-600 font-bold mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter your email" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Phone Number Field -->
            <div class="mb-4">
                <label class="block text-gray-600 font-bold mb-2" for="telephone">Phone Number</label>
                <input type="text" name="telephone" id="telephone" placeholder="Enter your phone number" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Address Field -->
            <div class="mb-4">
                <label class="block text-gray-600 font-bold mb-2" for="address">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter your address" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Password Field -->
            <div class="mb-4">
                <label class="block text-gray-600 font-bold mb-2" for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter your password" required
                    class="w-full p-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Signup Button -->
            <button type="submit" 
                class="w-full bg-blue-500 text-white font-bold py-3 rounded hover:bg-blue-600 transition duration-300">
                Sign Up
            </button>

            <!-- Login Link -->
            <div class="text-center mt-4">
                <span class="text-gray-600">Already have an account?</span>
                <a href="index.php" class="text-blue-500 font-bold hover:text-blue-700">Login</a>
            </div>
        </form>
    </div>
</body>

</html>
