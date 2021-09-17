<?php
    include 'databaseConnect.php';
    $email=$_POST['email']; 
    $personIDTEMP = $conn->query("SELECT personid from persons where email='".$email."'");
    $personID = mysqli_fetch_array($personIDTEMP);

    
    $cost1=$conn->query("select sum(cost) from cart where deliveryid=0 and personid=".$personID[0]);
    $cost=mysqli_fetch_array($cost1);
    $conn->query("insert INTO delivery (personID,totalCost) values (".$personID[0].",".$cost[0].")");

    $changeDeliveryID=mysqli_query($conn,"update cart set deliveryID=(select max(deliveryID) from delivery) where personID=".$personID[0]." and deliveryID=0");

    sleep(1);

    require "orderPlaced.html";
?>