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
    <title>Dashboard - Community Hub</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="font-jost bg-gradient-to-b from-gray-900 via-gray-800 to-gray-700 min-h-screen flex">
    <!-- Sidebar -->
    <div class="w-64 bg-gray-800 text-white flex flex-col items-center p-4">
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
    <div class="flex-1 flex flex-col">
        <div class="flex justify-between items-center bg-gray-700 text-white p-4">
            <h2 id="section-title" class="text-2xl font-bold">Dashboard</h2>
            <button id="add-event-button" class="p-2 bg-purple-700 rounded text-white">Add New Event</button>
        </div>

        <div id="content-container" class="p-6 flex-1 overflow-y-auto">
            <h2 class="text-3xl font-bold text-white mb-6">Welcome to Community Hub Dashboard</h2>
            <p class="text-lg text-gray-200 mb-4">Here you can manage events, view statistics, and more.</p>
                <div class="bg-gray-800 p-4 rounded-lg text-white">
                    <h4 class="text-xl font-bold mb-2">Total Event Count</h4>
                    <p><?php echo $totalevents ?></p>
                </div>
            </div>

            <div class="dash-con bg-gray-800 " >
                
            <?php
    $hasresult1 = $result1 && $result1->num_rows > 0;
    while ($row = $result1->fetch_assoc()) {
        echo '<div class="dash-details" 
                    data-username="' . $row["Username"] . '"
                    data-location="' . $row["Location"] . '"
                    data-joiners="' . $row["joiners"] . '"
                    data-donation-goal="' . $row["Donation_Goal"] . '"
                    data-total-donation="' . $row["Total_Donation"] . '"
                    data-banner-image="' . $row["Banner_Image"] . '">
                <h1>' . $row["Event_Name"] . '</h1>
                <div class="details-dash">
                    <p>Event ID</p>
                    <p>Posted by</p>
                    <p>Event Images</p>
                    <p>Location</p>
                    <p>Joiners</p>
                    <p>Donation Goal</p>
                    <p>Amount Donated</p>
                </div>
                <div class="class">
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                    <p>:</p>
                </div>
                <div class="details-dash">
                    <p>' . $row["Event_ID"] . '</p>
                    <p>' . $row["Username"] . '</p>';
                    $banner_image_path = $row["Banner_Image"];
                    if ($banner_image_path) {
                        echo '<img id="img-expand" src="' . $banner_image_path . '" alt="Event Banner" style="width: 50px; cursor: pointer;" />';
                    } else {
                        echo '<p>No banner image available</p>';
                    }
                    echo '<p>' . $row["Location"] . '</p>
                    <p>' . $row["joiners"] . '</p>
                    <p>' . $row["Donation_Goal"] . '</p>
                    <p>' . $row["Total_Donation"] . '</p>
                </div>
            </div>';
    }
?>



    
            </div>
    
        
        </div>


        

    </div>

    <div id="details-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="relative bg-white p-8 rounded-lg max-w-lg w-full">
            <button id="close-details-modal" class="absolute top-2 right-2 text-gray-700 text-xl">&times;</button>
            <h2 class="text-2xl font-bold mb-4">Event Details</h2>
            <div id="modal-details-content">
                <!-- Event Details will be inserted here -->
            </div>

            <div class="flex justify-between mt-6">
            <button class="join-button bg-gray-800 text-white p-2 rounded w-1/2 mr-2 font-bold"
    data-event-id="<?php echo $row['Event_ID']; ?>">
    Join
</button>



                <button id="donate-button" class="bg-blue-600 text-white p-2 rounded w-1/2 ml-2 font-bold">Donate via GCash</button>
            </div>
        </div>
    </div>

    
    <div id="details-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="relative bg-white p-8 rounded-lg max-w-lg w-full">
            <button id="close-details-modal" class="absolute top-2 right-2 text-gray-700 text-xl">&times;</button>
            <h2 class="text-2xl font-bold mb-4">Event Details</h2>
            <div id="modal-details-content">
                <!-- Event Details will be inserted here -->
            </div>

            <div class="flex justify-between mt-6">
                <button id="join-button" class="bg-gray-800 text-white p-2 rounded w-1/2 mr-2 font-bold">Join</button>
                <button id="donate-button" class="bg-blue-600 text-white p-2 rounded w-1/2 ml-2 font-bold">Donate via GCash</button>
            </div>
        </div>
    </div>

    <!-- Expanded Image Popup -->
    <div  id="popup-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50" style="display: none;" >
        <div class="relative bg-white p-4 rounded-lg">
            <button id="close-popup" class="absolute top-2 right-2 text-gray-700 text-xl">&times;</button>
            <img id="popup-image" src="./images/dd_bg.png" alt="Expanded Image" class="max-w-full max-h-screen rounded-lg" />
        </div>
    </div>


    <!-- Add Event Modal -->
    <div id="add-event-modal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg relative">
            <button id="close-add-event-modal" class="absolute top-2 right-2 text-gray-700 text-2xl">&times;</button>
            <h2 class="text-2xl font-bold mb-4">Add New Event</h2>
            <form id="add-event-form" method="POST" action="createevents.php" enctype="multipart/form-data">
            <input type="hidden" name="User_ID" value="<?php echo $_SESSION['User_ID']; ?>">
                <input type="text" name="event-name" id="event-name" placeholder="Event Name" class="w-full p-2 mb-4 border rounded" required />
                <input type="text" name="event-location" id="event-location" placeholder="Location" class="w-full p-2 mb-4 border rounded" required />
                <input type="text" name="event-phone" id="event-phone" placeholder="Phone Number" class="w-full p-2 mb-4 border rounded" required />
                <input type="date" name="event-date" id="event-date" class="w-full p-2 mb-4 border rounded" required />
                <input type="number" name="event-expenses" id="event-expenses" placeholder="Expenses" class="w-full p-2 mb-4 border rounded" required />
                <input type="number" name="funds-needed" id="funds-needed" placeholder="Donation Goal" class="w-full p-2 mb-4 border rounded" required />
                <input type="file" name="image" id="image">
                <button type="submit" name="createevent" class="w-full p-3 bg-purple-700 text-white font-bold rounded">Add Event</button>
            </form>
        </div>
    </div>



    

    <script src="index.js"></script>
</body>

</html>
