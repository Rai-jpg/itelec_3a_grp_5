<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'bayanihan_dataa';

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try{
        $connection = mysqli_connect($host, $user, $password, $dbname);
    }catch (Exception $ex)
    {
        echo'errors';
    }

        $query1 = "SELECT events_tbl.*, 
                   users_tbl.Username, 
                   IFNULL(SUM(donation.Amount_Donated), 0) AS Total_Donation
                   FROM events_tbl
                   LEFT JOIN users_tbl ON events_tbl.Event_Creator = users_tbl.User_ID
                   LEFT JOIN donation ON donation.Event_ID = events_tbl.Event_ID
                   GROUP BY events_tbl.Event_ID, users_tbl.Username";
        $result1 = $connection->query($query1);

        $query2 = "SELECT events_tbl.*, 
                   users_tbl.Username, 
                   DAY(events_tbl.Event_Date) AS Event_Day, 
                   events_tbl.Event_Date AS Full_Event_Date,
                   IFNULL(SUM(donation.Amount_Donated), 0) AS Total_Donation
           FROM events_tbl
           LEFT JOIN users_tbl ON events_tbl.Event_Creator = users_tbl.User_ID
           LEFT JOIN donation ON donation.Event_ID = events_tbl.Event_ID
           GROUP BY events_tbl.Event_ID, users_tbl.Username";
        $result2 = $connection->query($query2);

        $user_id = $_SESSION['User_ID']; // Get the logged-in user's ID from the session

        $query3 = "SELECT events_tbl.*, 
                        users_tbl.Username, 
                        DAY(events_tbl.Event_Date) AS Event_Day, 
                        events_tbl.Event_Date AS Full_Event_Date,
                        IFNULL(SUM(donation.Amount_Donated), 0) AS Total_Donation
                FROM events_tbl
                LEFT JOIN users_tbl ON events_tbl.Event_Creator = users_tbl.User_ID
                LEFT JOIN donation ON donation.Event_ID = events_tbl.Event_ID
                WHERE events_tbl.Event_Creator = '$user_id'
                GROUP BY events_tbl.Event_ID, users_tbl.Username";

        $result3 = $connection->query($query3);

        $eventcount = "SELECT COUNT(Event_ID) AS Event_ID FROM events_tbl";
        $eventcounttotal = $connection->query($eventcount);
        $row = $eventcounttotal->fetch_assoc();
        $totalevents = $row["Event_ID"];

        $query4 = "SELECT Event_ID, SUM(Amount_Donated) As Total_Amount
        FROM donation
        GROUP BY Event_ID";
        $result4 = $connection->query($query4);

        $query5 = "SELECT *
        FROM joined_events";
        $result5 = $connection->query($query5);
    
?>
