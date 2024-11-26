<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'bayanihan_dataa';

// Create the connection
$connection = mysqli_connect($host, $user, $password, $dbname);

// Check the connection
if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
