<?php

    $productId = $_POST["productID"];

    // $host = "localhost";
    // $dbUsername = "admin";
    // $dbPassword = "admin";
    // $dbname = "shoponline";
    $host = "sql206.epizy.com";
    $dbUsername = "epiz_29762748";
    $dbPassword = "CrifBpYoOS3lWg";
    $dbname = "epiz_29762748_shoponline";

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
    die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
    $conn -> query("DELETE from product where productid = ".$productId);
    sleep(2);
    // header("Location: http://localhost/shopOnline/ui/ui/dbms-shoponline/With%20PHP/adminProductManage.php");
    header("Location: ../adminProductManage.php");
    exit();
    } 
    $conn->close();
    
?>


