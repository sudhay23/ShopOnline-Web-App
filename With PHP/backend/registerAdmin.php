<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$accountpassword = $_POST['password'];
$dob = $_POST['dob'];
$phoneno = $_POST['phoneno'];
$email = $_POST['email'];
$accesslevel = $_POST['accesslevel'];
$salary = $_POST['salary'];
$address = $_POST['address'];

include 'databaseConnect.php';


    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT_ONE = "SELECT email from persons where email = ? limit 1";
     $INSERT_ONE = "INSERT into persons (fname, lname, accesslevel, accountpassword, dob, phoneno, email, address) values(?, ?, ?, ?, ?, ?, ?, ?)";
     $SELECT_TWO = "SELECT personid from persons where email = ? limit 1";
     $INSERT_TWO = "INSERT into admin (personid, salary) values(?, ?)";

     //Prepare statement
     $stmt = $conn->prepare($SELECT_ONE);
     $stmt->bind_param("s",$email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $stmt->fetch();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT_ONE);
      $stmt->bind_param("sssssiss", $fname, $lname, $accesslevel, $accountpassword, $dob, $phoneno, $email, $address );
      $stmt->execute();
      $stmt->close();

        $stmt = $conn->prepare($SELECT_TWO);
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->bind_result($PERSON_ID);
        $stmt->store_result();
        $stmt->fetch();
        $stmt->close();

        $stmt = $conn->prepare($INSERT_TWO);
      $stmt->bind_param("ii", $PERSON_ID, $salary);
      $stmt->execute();
      require "successRegisterAdmin.html";
     } else {
      require 'failedRegisterAdmin.html';
     }
     $stmt->close();
     $conn->close();
    }
?>
