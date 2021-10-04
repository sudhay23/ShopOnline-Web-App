<?php

    $productId = $_POST["productID"];

    include 'databaseConnect.php';

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


