<?php
    // $host = "localhost";
    $host = "localhost";
    $dbUsername = "admin";
    $dbPassword = "shoponline123";
    $dbname = "shoponline";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) 
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
?>
