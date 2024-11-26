<?php
include('bayanihan.php'); // Include the connection script

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$response = array('success' => false, 'message' => 'Unknown error');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the user and event IDs from the POST data
    $userid = mysqli_real_escape_string($connection, $_POST['User_ID']);
    $eventid = mysqli_real_escape_string($connection, $_POST['Event_ID']);

    // Insert the event into the joined_events table
    $query = "INSERT INTO joined_events (Event_ID, User_ID) VALUES ('$eventid', '$userid')";

    if (mysqli_query($connection, $query)) {
        // Update the joiners count in the events table
        $updateQuery = "UPDATE events_tbl SET joiners = joiners + 1 WHERE Event_ID = '$eventid'";

        if (mysqli_query($connection, $updateQuery)) {
            // Get the updated joiners count (optional)
            $countQuery = "SELECT joiners FROM events_tbl WHERE Event_ID = '$eventid'";
            $result = mysqli_query($connection, $countQuery);
            $row = mysqli_fetch_assoc($result);
            $newJoinersCount = $row['joiners'];

            // Return a success response
            $response = array(
                'success' => true,
                'newJoinersCount' => $newJoinersCount,
            );
        } else {
            $response['message'] = 'Error updating joiners count: ' . mysqli_error($connection);
        }
    } else {
        $response['message'] = 'Error: ' . mysqli_error($connection);
    }
}

// Return the response as JSON
echo json_encode($response);
?>
