<?php
session_start();
include('bayanihan.php'); // Database connection file

header('Content-Type: application/json');

// Get the raw POST data
$input = json_decode(file_get_contents('php://input'), true);

if (isset($input['eventId'])) {
    $eventId = $input['eventId'];

    // Update joiners count in the database
    $query = "UPDATE events SET joiners = joiners + 1 WHERE Event_ID = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $eventId);

    if ($stmt->execute()) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to update joiners count']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}

$conn->close();
?>
