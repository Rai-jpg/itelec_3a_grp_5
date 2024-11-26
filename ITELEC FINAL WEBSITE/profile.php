<?php
    session_start();
    include('queries.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-800 to-gray-700 min-h-screen text-white font-sans">

    <!-- Flex container for Sidebar and Main Content -->
    <div class="flex min-h-screen">

        <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white flex flex-col items-center p-4 h-screen">
        <h1 class="text-2xl font-bold mb-6">Community Hub</h1>
            <ul id="menu" class="w-full">
                <a href="dashboard.php">
                    <li class="flex items-center p-2 hover:bg-gray-700 cursor-pointer">
                        <i class="fas fa-home mr-3"></i>
                        <span>Dashboard</span>
                    </li>
                </a>
                <a href="profile.php">
                    <li class="flex items-center p-2 hover:bg-gray-700 cursor-pointer">
                        <i class="fas fa-user mr-3"></i>
                        <span>Profile</span>
                    </li>
                </a>
                <a href="events.php">
                    <li class="flex items-center p-2 hover:bg-gray-700 cursor-pointer">
                        <i class="fas fa-calendar-alt mr-3"></i>
                        <span>Events</span>
                    </li>
                </a>
                <a href="about.php">
                    <li class="flex items-center p-2 hover:bg-gray-700 cursor-pointer">
                        <i class="fas fa-question-circle mr-3"></i>
                        <span>About Us</span>
                    </li>
                </a>
                <a href="logout.php">
                    <li id="logout-button" class="flex items-center p-2 hover:bg-red-600 cursor-pointer">
                        <i class="fas fa-sign-out-alt mr-3"></i>
                        <span>Logout</span>
                    </li>
                </a>
            </ul>
    </div>

        <!-- Main Content -->
        <div class="flex-1 p-8">
            <div class="flex justify-between items-center bg-gray-700 text-white p-4 mb-4">
                <h2 id="section-title" class="text-2xl font-bold">Profile</h2>
            </div>
            <div class="max-w-3xl mx-auto bg-gray-800 p-8 rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold mb-8">Profile Information</h1>
                <div id="user-info" class="mb-8">
                    <p><strong>Username: <?php echo $_SESSION['Username']; ?></strong></p>
                    <p><strong>Email:</strong> <?php echo $_SESSION['Email']; ?> </p>
                    <p><strong>Telephone:</strong> <?php echo $_SESSION['Phone_Num']; ?> </p>
                    <p><strong>Address:</strong>  <?php echo $_SESSION['User_Address']; ?>  </p>
                </div>

                <h2 class="text-2xl font-bold mb-4">Events Created by You</h2>
                <?php if ($result3 && $result3->num_rows > 0): ?>
                    <div id="created-events" class="space-y-4">
                        <?php while ($row = $result3->fetch_assoc()): ?>
                            <div class="bg-gray-700 p-4 rounded">
                                <h3 class="text-xl font-bold"><?php echo htmlspecialchars($row["Event_Name"]); ?></h3>
                                <p>Location: <?php echo htmlspecialchars($row["Location"]); ?></p>
                                <p>Date: <?php echo htmlspecialchars($row["Full_Event_Date"]); ?></p>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
                    <p class="text-gray-500">No events found.</p>
                <?php endif; ?>

               
                <h2 class="text-2xl font-bold mt-8 mb-4">Events You Joined</h2>
                <div id="joined-events" class="space-y-4">
                    <div class="bg-gray-700 p-4 rounded">
                        <h3 class="text-xl font-bold">Event Name: </h3>
                        <p>Location:</p>
                        <p>Date: </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    
</body>

</html>
