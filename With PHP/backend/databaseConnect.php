<?php
    // $host = "localhost";
    $host = "localhost";
    $dbUsername = "id17684848_admin";
    $dbPassword = "s[|^CZh=+m-&)e0o";
    $dbname = "id17684848_shoponline";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) 
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
?>