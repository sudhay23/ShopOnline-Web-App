<?php 
include 'databaseConnect.php';

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) 
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

    $email=$_POST['email']; 
    $personIDTEMP=$conn->query("select personID from persons where email='".$email."'");
    $personID = mysqli_fetch_array($personIDTEMP);

$returnTOStock=$conn->query("select productID,quantity from cart where personID=".$personID[0]." and deliveryID=0");

 while($row = mysqli_fetch_array($returnTOStock))
        {
           $prodid = $row[0];
           $prodqty = $row[1];
           $conn->query("UPDATE product SET productStock = productStock + ".$prodqty." WHERE productID = ".$prodid);
        }

$result=mysqli_query($conn,"delete from cart where personID=".$personID[0]." and deliveryID=0");

sleep(1);

require "cartClearSuccess.html";



?>
