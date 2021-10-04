<?php

    $productId = $_POST['productId'];
    $productQty = $_POST['productQty'];
    $personEmail = $_POST['personEmail'];
    $productStock = $_POST['productStock'];

    // $productId = 1;
    // $productQty = 1;
    // $personEmail = 'test1@gmail.com';
    // $productStock = 400;

    include 'databaseConnect.php';


    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    // Decrease Stock
    $conn->query("UPDATE product SET productStock = ".($productStock-$productQty)." WHERE productId = ".$productId);

    $myCost = $conn->query("SELECT productprice from product where productid=".$productId);
    $oneCost = mysqli_fetch_array($myCost);
    $personidTEMP = $conn->query("SELECT personid from persons where email='".$personEmail."'");
    $personid = mysqli_fetch_array($personidTEMP);

    $costPrice = $oneCost[0]*$productQty;

    $tempResultTEMP = $conn->query("SELECT * from cart where personid=".$personid[0]." and productid=".$productId." and deliveryid = 0");
    $tempResult = mysqli_fetch_array($tempResultTEMP);
    sleep(1);

    if(is_array($tempResult))
    {
        $alreadyQtyTEMP = $conn->query("SELECT quantity,cost from cart where personid=".$personid[0]." and productid=".$productId." and deliveryid = 0");
        $alreadyQty = mysqli_fetch_array($alreadyQtyTEMP);
        sleep(1);
        $conn->query("UPDATE cart SET quantity = ".($alreadyQty[0]+$productQty).",cost = ".($alreadyQty[1]+$costPrice)." WHERE personid=".$personid[0]." and productid=".$productId." and deliveryid = 0" );
    }
    else
    {
        $conn->query("INSERT into cart values (".$personid[0].",".$productId.",".$productQty.",".$costPrice.",'NULL')");
    }


    
    sleep(1);
    header("Location: ../customerProductView.php");
    exit();
    $conn->close();

// IGNORE
    // if (mysqli_connect_error()) {
    // die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    // } else {
    // $oneCost = $conn->query("SELECT productprice from product where productid=".$productId);
    // sleep(1);
    // $personid = $conn->query("SELECT personid from persons where email=".$personEmail);
    // sleep(1);
    // // $conn->query("INSERT into cart values (".$personid.",".$productId.",".$productQty.",".(int)$productQty*(int)$oneCost['productprice'].")");
    // sleep(1);
    // // header("Location: http://localhost/shopOnline/ui/ui/dbms-shoponline/With%20PHP/adminProductManage.php");
    // header("Location: http://localhost/shoponline-v2/With%20PHP/customerProductView.php");
    // exit();
    // } 
    // $conn->close();


?>
