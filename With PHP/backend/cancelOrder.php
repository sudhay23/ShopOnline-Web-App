<?php
include 'databaseConnect.php';

    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) 
    {
        die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    }

    $delID=$_POST['cancelOrderID']; 
    $email=$_POST['email']; 
     $delStatus="Order Canceled";
     $delStatus2="Requested Cancellation";

     $status1=$conn->query("select deliveryStatus from delivery where deliveryID=".$delID);
     $status=mysqli_fetch_array($status1);

     if($status[0]==$delStatus){
        require "orderCancelFailed.html";


     }
     else{



$returnTOStock=$conn->query("select product.productID,cart.quantity from product,cart where cart.productID=product.productID and cart.deliveryID=".$delID);

 while($row = mysqli_fetch_array($returnTOStock))
        {
           $prodid = $row[0];
           $prodqty = $row[1];
           $conn->query("UPDATE product SET productStock = productStock + ".$prodqty." WHERE productID = ".$prodid);
        }
       


$result=mysqli_query($conn,"update delivery set deliveryStatus='".$delStatus2."' where deliveryID =".$delID);

sleep(1);

require "orderCancelSuccess.html";
}



?>
