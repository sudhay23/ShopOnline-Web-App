<?php

require __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$host = $_ENV['host']; // if the variable is found then return the variable host else returns the other key
$dbUsername = $_ENV['dbUsername'];
$dbPassword = $_ENV['dbPassword'];
$dbname = $_ENV['dbname'];


    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) 
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }
?>