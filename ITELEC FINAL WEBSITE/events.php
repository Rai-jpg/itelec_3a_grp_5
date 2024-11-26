<?php   
    session_start();
    include('bayanihan.php');
    include ('queries.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link href="style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-jost bg-gradient-to-b from-gray-900 via-gray-800 to-gray-700 min-h-screen flex">

    <div class="flex h-screen">
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
    </div>
    


    <div class="con-events">
        <div class="con-events-content">
            <div class="details">
                <h1>Upcoming Events</h1>
                <p>Discover all our upcoming events and community activities. Join us to make a difference.</p>
               <a href="dashboard.html"><button>Go to Dashboard</button></a>
            </div>
        </div>

        <div class="con-events-content1 bg-gray-800">
            <div class="con-events ">
<?php
$hasresult2 = $result2 && $result2->num_rows > 0;
if ($hasresult2) {
    while ($row = $result2->fetch_assoc()) { ?>
        <div class="event">
            <div class="event-card">
                <div class="event-details">
                    <h1><?= htmlspecialchars($row["Event_Day"]) ?></h1>
                </div>
            </div>
            <div class="event-card1">
                <div class="event-details1">
                    <h1><?= htmlspecialchars($row["Event_Name"]) ?></h1>
                    <p>Posted by: <?= htmlspecialchars($row["Username"]) ?></p>
                    <p>Goal: <?= htmlspecialchars($row["Donation_Goal"]) ?> pesos</p>
                    <p>Date created: <?= htmlspecialchars($row["Full_Event_Date"]) ?></p>
                    <p>Joiners: <?= htmlspecialchars($row["joiners"]) ?></p>
                </div>
            </div>
        </div>
    <?php }
} else {
    echo "<p>No events found.</p>";
}
?>

            </div>

        </div>

    </div>
</body>

</html>
