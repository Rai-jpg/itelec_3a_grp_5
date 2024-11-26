<?php
include('bayanihan.php'); // Include the connection script

if (isset($_POST['createevent'])) {
    $creator = mysqli_real_escape_string($connection, $_POST['User_ID']);
    $eventname = mysqli_real_escape_string($connection, $_POST['event-name']);
    $location = mysqli_real_escape_string($connection, $_POST['event-location']);
    $phone = mysqli_real_escape_string($connection, $_POST['event-phone']);
    $eventdate = mysqli_real_escape_string($connection, $_POST['event-date']);
    $expenses = mysqli_real_escape_string($connection, $_POST['event-expenses']);
    $donationgoal = mysqli_real_escape_string($connection, $_POST['funds-needed']);
    $joiners = 0;

    // Check if file is uploaded and there are no errors
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $banner_name = $_FILES['image']['name'];
        $banner_temp = $_FILES['image']['tmp_name'];
        $banner_size = $_FILES['image']['size'];
        $ext = explode(".", $banner_name);
        $end = end($ext);
        $allowed_ext = array("jpg", "JPG", "jpeg", "JPEG", "gif", "GIF", "png", "PNG");

        // Generate a unique file name
        $name = time() . "." . $end;
        $path = "upload/" . $name;

        // Check file type
        if (in_array($end, $allowed_ext)) {
            // Check file size (limit to 5MB)
            if ($banner_size > 5242880) {
                echo "<script>alert('File too large!')</script>";
                echo "<script>window.location = 'dashboard.php';</script>";
            } else {
                // Move the uploaded file to the "upload" folder
                if (move_uploaded_file($banner_temp, $path)) {
                    $query = "INSERT INTO events_tbl (Event_Creator, Event_Name, Phone_Num, Location, Event_Date, Banner_Image, Expenses, Donation_Goal, Joiners, Verified) 
                            VALUES ('$creator', '$eventname', '$phone', '$location', '$eventdate', '$path', '$expenses', '$donationgoal', '$joiners', '$verified')";

                    // Check if query is successful
                    if (mysqli_query($connection, $query)) {
                        echo "<script>alert('Event added successfully!')</script>";
                        echo "<script>window.location = 'dashboard.php';</script>";
                    } else {
                        echo "<script>alert('Database error: " . mysqli_error($connection) . "');</script>";
                        echo "<script>window.location = 'createevents.php';</script>";
                    }
                }
            }
        } else {
            echo "<script>alert('Invalid image format!')</script>";
            echo "<script>window.location = 'createevents.php';</script>";
        }
    } else {
        echo "<script>alert('No file uploaded or there was an error.')</script>";
        echo "<script>window.location = 'createevents.php';</script>";
    }
}
?>
