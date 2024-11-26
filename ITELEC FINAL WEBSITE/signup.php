<?php
include('bayanihan.php'); // Include the connection script

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($connection, $_POST['username']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $telephone = mysqli_real_escape_string($connection, $_POST['telephone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);

    $query = "INSERT INTO users_tbl (Username, Email, Phone_Num, User_Address, Password) VALUES ('$username', '$email', '$telephone', '$address', '$password')";

    if (mysqli_query($connection, $query)) {
        echo '<script>alert("Signup successful!");</script>';
        echo '<script>window.location.assign("index.php");</script>';
    } else {
        echo '<script>alert("Error: ' . mysqli_error($connection) . '");</script>';
        echo '<script>window.location.assign("register.php");</script>';
    }
}
?>
