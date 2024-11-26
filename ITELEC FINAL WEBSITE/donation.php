<?php
include('bayanihan.php'); // Include the connection script

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid = mysqli_real_escape_string($connection, $_POST['User_ID']);
    $eventid = mysqli_real_escape_string($connection, $_POST['Event_ID']);
    $donation = mysqli_real_escape_string($connection, $_POST['Amount_Donated']);


    
    $query = "INSERT INTO donation (Event_Creator, Event_Name, Location) VALUES ('$userid', '$eventid', '$donation')";

    if (mysqli_query($connection, $query)) {
        echo '<script>alert("Donation successful!");</script>';
        echo '<script>window.location.assign("login.html");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
        echo '<script>window.location.assign("signup.html");</script>';
    }
}
?>
