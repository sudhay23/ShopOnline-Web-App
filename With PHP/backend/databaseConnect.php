<?php
    // $host = "localhost";
    $host = "sql206.epizy.com";
    $dbUsername = "epiz_29762748";
    $dbPassword = "CrifBpYoOS3lWg";
    $dbname = "shoponline";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) 
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
?>