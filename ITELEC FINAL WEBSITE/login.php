<?php
session_start();
include('bayanihan.php'); // Include database connection

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = mysqli_real_escape_string($connection, $_POST['Email']);
    $password = mysqli_real_escape_string($connection, $_POST['Password']);

    if (!$email || !$password) {
        die("Email or Password missing.");
    }

    if (!$connection) {
        die("Database connection error: " . mysqli_connect_error());
    }

    $query = "SELECT * FROM users_tbl WHERE Email = '$email'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die("Query error: " . mysqli_error($connection));
    }

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Directly compare the entered password with the stored plain text password
        if ($password === $user['Password']) {
            // Set session variables for the logged-in user
            $_SESSION['User_ID'] = $user['User_ID'];
            $_SESSION['Username'] = $user['Username'];
            $_SESSION['Email'] = $user['Email'];
            $_SESSION['Phone_Num'] = $user['Phone_Num'];
            $_SESSION['User_Address'] = $user['User_Address'];

            // Redirect to the dashboard
            header('Location: dashboard.php');
            exit;
        } else {
            echo '<script>alert("Incorrect password. Please try again.");</script>';
            echo '<script>window.location.assign("index.php");</script>';
        }
    } else {
        echo '<script>alert("User not found.");</script>';
        echo '<script>window.location.assign("index.php");</script>';
    }
}
?>
