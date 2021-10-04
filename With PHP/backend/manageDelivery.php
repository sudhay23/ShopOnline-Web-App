<?php
    $deliveryid = $_POST['deliveryid'];
    $deliverydate = $_POST['deliverydate'];
    $deliverystatus = $_POST['deliverystatus'];

    include 'databaseConnect.php';


    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);


    $SELECT_ONE = "SELECT deliveryStatus from delivery where deliveryid = ? limit 1";

    $stmt = $conn->prepare($SELECT_ONE);
    $stmt->bind_param("i",$deliveryid);
    $stmt->execute();
    $stmt->bind_result($TEMP_DELIVERY_STATUS);
    $stmt->store_result();
    $stmt->fetch();
    $rnum = $stmt->num_rows;
    if($rnum==0)
    {
        $stmt->close();
        require "failedDeliveryModify.html";
    }
    else
    {
        $conn->query("UPDATE delivery SET deliveryStatus = '".($deliverystatus)."' , deliveryDate = '".($deliverydate)."' WHERE deliveryid = ".$deliveryid);
        sleep(1);
        require "successDeliveryModify.html";
    }
    $conn->close();

?>
